<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'content', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
