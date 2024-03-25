<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'likes'
    ];

    /**
     * Getting all comments of the idea from database 
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
