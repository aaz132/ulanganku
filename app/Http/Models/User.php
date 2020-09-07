<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    var $table = 'users';
    protected $hidden = ['password'];
    public function role()
    {
        return $this->hasOne('App\Models\InitUserRole', 'id', 'id_role');
    }
}
