<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title']; // Assuming 'title' is a field in your 'categories' table

    // Define the many-to-many relationship
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post');
    }
}
    