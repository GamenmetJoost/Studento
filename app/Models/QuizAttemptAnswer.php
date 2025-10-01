<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizAttemptAnswer extends Model
{
    protected $fillable = [
        'quiz_attempt_id',
        'question_id',
        'choice_id',
        'answer_value',
        'was_correct',
        'answered_at',
    ];

    protected $casts = [
        'answered_at' => 'datetime',
        'was_correct' => 'boolean',
    ];

    public function attempt(): BelongsTo { return $this->belongsTo(QuizAttempt::class, 'quiz_attempt_id'); }
    public function question(): BelongsTo { return $this->belongsTo(Question::class); }
    public function choice(): BelongsTo { return $this->belongsTo(Choice::class); }
}
