<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select([
            'id', 
            'name', 
            'username',
        ]);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
