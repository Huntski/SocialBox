<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function image()
    {
        return "/storage/{$this->image}";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
