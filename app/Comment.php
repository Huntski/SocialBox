<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @return void
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}