<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Profile;

class Post extends Model
{
    protected $guarded = [];

    /**
    * Searches and return the users profile imaage.
    * @return string/bool
    */
    public function image()
    {
        if ($this->image) {
            return "/storage/{$this->image}";
        }
        return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
    }
}
