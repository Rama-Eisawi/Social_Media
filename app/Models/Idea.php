<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    //$gaurded is the oppsite of fillable, so it doesn't allow mass assignment
    protected $fillable = ['user_id','content', 'likes']; //it allows mass assignment

    public function comments()
    {
        return $this->hasMany(Comment::class,'idea_id','id'); //we don't need to define idea_id, id
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
