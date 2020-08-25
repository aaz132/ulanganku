<?php

namespace App\Http\Controllers;
use App\Models\MapUserHobby;

use Illuminate\Http\Request;

class MapUserHobbyController extends Controller
{
    public function createMapUserHobby(Request $request)
    {
        $hobby = MapUserHobby::insert([
            'id_user' => $request->id_user,
            'id_hobby' => $request->id_hobby,
            'status' => $request ->status
        ]);
    }
    public function getUser(Request $request){
        $mapuserhobby = MapUserHobby::
    }
}
