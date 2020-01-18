<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function avatar()
    {
        $path = ($this->avatar) ? '/storage/' . $this->avatar : '/storage/uploads/default.png';
        return $path;
    }

    public function banner()
    {
        $path = ($this->banner) ? '/storage/' . $this->banner : '';
        return $path;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function follows()
    {
        // return $this->
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    /**
     * Users have mulitible comments
     * @return void
     */
     public function comments()
     {
         return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
     }
}