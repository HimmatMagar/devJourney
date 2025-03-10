<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    #Mutetrators
    public function getCreatedAtAttribute($value) {
        return date('D Y M', strtotime($value));
    }

    #Relation to users table
    public function relToUser() {
        return $this -> belongsTo(User::class, 'user_id', 'id');
    }

    #Relation to likes table when the user like the post
    public function like() {
        return $this -> hasMany(Like::class);
    }

    public function comment() {
        return $this -> hasMany(Comment::class);
    }

    public function getLikeCountAttribute()
    {
        return $this->like()->count();
    }
}
