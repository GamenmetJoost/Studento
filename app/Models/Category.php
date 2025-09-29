<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'sector',   // voorheen 'name'
        'category', // voorheen 'subcategory'
        'folder_guid'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
