<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'readings', 'book_id', 'user_id');
    }
}
