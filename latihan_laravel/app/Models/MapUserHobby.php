<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapUserHobby extends Model
{
    protected $table = 'map_user_hobby';

    public function user(){
        return $this->hasMany('Users');
    }
    public function hobbies(){
        return $this->hasMany('Hobbies');
    }
}
