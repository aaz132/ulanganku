<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    public function mapuserhobby(){
        return $this->belongsTo('MapUserHobby');
    }
}
