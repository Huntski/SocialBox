<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function image()
    {
        if ($this->image)
            return "/storage/{$this->image}";
        else
            return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
