<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'seotitle',
        'active'
    ];

    // Define relationships
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_posts', 'category_id', 'post_id')->withTimestamps();
    }
}
