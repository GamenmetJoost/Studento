<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@admin.com',
            'password' => 'Test1234',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Test Student',
            'email' => 'test@student.com',
            'password' => 'Test1234',
            'role' => 'student'
        ]);

        // Import questions from XML files
        $this->importQuestionsFromFolder();

        // Example user IDs: 1, 2, 3 (make sure these users exist in your users table)
        DB::table('quiz_results')->insert([
            ['user_id' => User::factory()->create()->id, 'correct_answers' => rand(1,10), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => User::factory()->create()->id, 'correct_answers' => rand(1,10), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => User::factory()->create()->id, 'correct_answers' => rand(1,10), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => User::factory()->create()->id, 'correct_answers' => rand(1,10), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => User::factory()->create()->id, 'correct_answers' => rand(1,10), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Import all QTI XML files from the database/questions folder
     */
    private function importQuestionsFromFolder(): void
    {
        $questionsPath = database_path('questions');
        
        if (!is_dir($questionsPath)) {
            $this->command->info('Questions folder not found at: ' . $questionsPath);
            return;
        }

        // Get all XML files in the questions folder
        $xmlFiles = glob($questionsPath . '/*.xml');
        
        if (empty($xmlFiles)) {
            $this->command->info('No XML files found in questions folder');
            return;
        }

        $this->command->info('Found ' . count($xmlFiles) . ' XML file(s) to import');
        
        $importer = new \App\Imports\QtiImporter();
        $importedCount = 0;

        foreach ($xmlFiles as $xmlFile) {
            try {
                $this->command->info('Importing: ' . basename($xmlFile));
                $importer->import($xmlFile);
                $importedCount++;
            } catch (\Exception $e) {
                $this->command->error('Failed to import ' . basename($xmlFile) . ': ' . $e->getMessage());
            }
        }

        $this->command->info("Successfully imported {$importedCount} question file(s)");
    }
}
