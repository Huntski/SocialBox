<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function image()
    {
        $path = ($this->image) ? '/storage/' . $this->image : '/storage/uploads/default.png';
        return $path;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
}
}
