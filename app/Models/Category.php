<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'sector',   // voorheen 'name'
        'category', // voorheen 'subcategory'
        'folder_guid',
    ];

    /**
     * Get the questions belonging to this category.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * The users who have selected this category.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'category_user');
    }

        /**
         * Get the quiz attempts for this category.
         */
        public function quizAttempts()
        {
            return $this->hasMany(\App\Models\QuizAttempt::class);
        }
}
