<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function getAllUser(Request $request)
    {
        $user = Users::all();
        return response()->json($user);
    }
    public function getFemaleUser(Request $request)
    {
        $user = Users::where('gender', 'F')->get();
        return response()->json($user);
    }
    public function getMaleUser(Request $request)
    {
        $user = Users::where('gender', 'M')->get();
        return response()->json($user);
    }

    public function createUser(Request $request)
    {
        $users = Users::insert([
            'name' => $request->name,
            'gender' => $request->gender,
            'status' => $request->status
        ]);
    }
    
}
