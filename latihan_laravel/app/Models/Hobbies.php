<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobbies extends Model
{
    protected $table = 'hobbies';

    public function mapuserhobby(){
        return $this->belongsto('MapUserHobby');
    }
}
