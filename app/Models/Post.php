<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['userID', 'categoryID', 'title', 'description', 'photo', 'date', 'location', 'contact'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'postID');
    }
}