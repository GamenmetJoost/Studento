<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'subcategory', 
        'folder_guid'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
