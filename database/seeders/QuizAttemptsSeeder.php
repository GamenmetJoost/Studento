<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\Choice;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptAnswer;

class QuizAttemptsSeeder extends Seeder
{
    /**
     * Seed realistic quiz attempts and answers so admins can view stats and details without manual input.
     */
    public function run(): void
    {
        // Ensure we have some student users
        $students = User::where('role', 'student')->get();
        if ($students->count() < 5) {
            $toCreate = 5 - $students->count();
            for ($i = 0; $i < $toCreate; $i++) {
                $students->push(
                    User::factory()->create([
                        'role' => 'student',
                    ])
                );
            }
        }

        $categories = Category::query()->inRandomOrder()->limit(5)->get();
        if ($categories->isEmpty()) {
            $this->command?->warn('No categories found; skipping QuizAttemptsSeeder.');
            return;
        }

        foreach ($students as $student) {
            // Each student: 2-4 attempts across random categories
            $attemptCount = rand(2, 4);
            for ($i = 0; $i < $attemptCount; $i++) {
                $category = $categories->random();

                // Pick a subset of questions to keep data small and fast
                $questionLimit = rand(10, 18);
                $questions = Question::where('category_id', $category->id)
                    ->inRandomOrder()
                    ->limit($questionLimit)
                    ->get();

                if ($questions->isEmpty()) {
                    continue;
                }

                $startedAt = now()->subDays(rand(0, 28))->subMinutes(rand(0, 60 * 12));
                $duration = rand(90, 900); // 1.5m to 15m
                $finishedAt = (clone $startedAt)->addSeconds($duration);

                // Create attempt first with placeholders for scores
                $attempt = QuizAttempt::create([
                    'user_id' => $student->id,
                    'category_id' => $category->id,
                    'total_questions' => $questions->count(),
                    'answered_questions' => $questions->count(),
                    'correct_answers' => 0,
                    'score_percent' => 0,
                    'started_at' => $startedAt,
                    'finished_at' => $finishedAt,
                    'duration_seconds' => $duration,
                ]);

                $correct = 0;
                foreach ($questions as $q) {
                    $hasChoices = $q->choices()->exists();
                    $selectedChoiceId = null;
                    $answerValue = null;
                    $wasCorrect = false;

                    if ($hasChoices) {
                        $choice = $q->choices()->inRandomOrder()->first();
                        if ($choice) {
                            $selectedChoiceId = $choice->id;
                            $wasCorrect = (bool) $choice->is_correct;
                        }
                    } else {
                        // Fallback boolean questions (rare in current data)
                        $answerValue = rand(0, 1) ? 'true' : 'false';
                        // In our app, boolean fallback treats 'true' as correct for seeding
                        $wasCorrect = ($answerValue === 'true');
                    }

                    QuizAttemptAnswer::create([
                        'quiz_attempt_id' => $attempt->id,
                        'question_id' => $q->id,
                        'choice_id' => $selectedChoiceId,
                        'answer_value' => $answerValue,
                        'was_correct' => $wasCorrect,
                        'answered_at' => $startedAt->copy()->addSeconds(rand(10, $duration)),
                    ]);

                    if ($wasCorrect) { $correct++; }
                }

                $scorePercent = $questions->count() > 0
                    ? round(($correct / $questions->count()) * 100, 2)
                    : 0;

                $attempt->update([
                    'correct_answers' => $correct,
                    'score_percent' => $scorePercent,
                ]);
            }
        }

        $this->command?->info('QuizAttemptsSeeder: dummy attempts and answers generated.');
    }
}
