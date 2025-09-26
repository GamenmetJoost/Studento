<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'identifier', 
        'question_text',
        'category_id'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
