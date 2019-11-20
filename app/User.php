<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'login', 'cpf', 'email', 'password'
    ];

    public function books()
    {
        return $this->belongsToMany('App\Book', 'readings', 'user_id', 'book_id');
    }

}
