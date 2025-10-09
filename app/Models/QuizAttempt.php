<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\QuizAttemptAnswer;

class QuizAttempt extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'total_questions',
        'answered_questions',
        'correct_answers',
        'score_percent',
        'started_at',
        'finished_at',
        'duration_seconds',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function answers(): HasMany { return $this->hasMany(QuizAttemptAnswer::class); }
}
