<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory;

    protected $with = [
        // 'user:id,name,image',
        'user',
        'comments.user'
    ];
    protected $withCount = [
        'likes',
        'comments'
    ];
    protected $fillable = [
        'content',
        'user_id'
    ];

    /**
     * Getting all comments of the idea from database 
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    /**
     * Getting The user who is the owner of this Idea
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Getting Likes of users
     */
    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    /**
     * search something
     *
     * @param Builder $query
     * @param string $search
     * @return void
     */
    public function scopeSearch(Builder $query, $search = '')
    {
        $query->where('content', 'like', '%' . $search . '%');
    }
}
