<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAllUsers(Request $request)
    {
        $user = User::all();
        return $this->sendSuccess([
            'data' => $user
        ],'success');
        return $this->sendError($errornya, '404 Error');
    }
    
}
