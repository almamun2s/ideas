<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $with = [
        // 'user:id,name,image',
        'user',
        'comments.user'
    ];
    protected $fillable = [
        'content',
        'user_id'
    ];

    /**
     * Getting all comments of the idea from database 
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }


    /**
     * Getting The user who is the owner of this Idea
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Getting Likes of users
     */
    public function likes(){
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }
}
