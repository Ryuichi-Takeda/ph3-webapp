<?php

namespace App;
// use App\Connect;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    // https://www.wakuwakubank.com/posts/377-laravel-relation-1/
}
