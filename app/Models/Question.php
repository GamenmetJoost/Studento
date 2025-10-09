<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
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

    // Helper om makkelijk naam/subcategorie te tonen
    public function getCategoryNameAttribute()
    {
        return $this->category?->name ?? '-';
    }

    public function getCategorySubcategoryAttribute()
    {
        return $this->category?->subcategory ?? '-';
    }
}
