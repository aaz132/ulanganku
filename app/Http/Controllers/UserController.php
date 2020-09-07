<?php

namespace App\Http\Controllers;

use App\Models\InitUserRole;
use App\User;
use \Firebase\JWT\JWT;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required'
        ]);
    
        if ($validator->fails()) {
          $errors = $this->parseValidator($validator);
          return $this->sendError($errors, 'Bad Request');
        }
        $input = $request->input();
        $password = $input['password'];
        $email = $input['email'];
    
        $user = User::where('email', $email)->first();
        if ($user == null) {
            return $this->sendError([
                'email' => 'User doesnt exists'
            ], 'User doesnt exists');
        }
    
        if ($email != null && Hash::check($password, $user->password)) {
          unset($user->password);
          $key = env('JWT_KEY_USER');
          $token = [
            'id' => $user->id,
            'email' => $user->email
          ];
          $jwt = JWT::encode($token, $key);
          $user->role;
          return $this->sendSuccess([
            'user' => $user,
            'token_access' => $jwt
          ], 'success');
        } else {
          return $this->sendError([
            'password' => 'Invalid password combination'
          ], 'unauthorized', 401);
        }
      }
      public function create(Request $request) {
        $validator = Validator::make($request->all(), [
          'email' => 'required|unique:users|email',
          'id_role' => 'required|exists:init_user_role,id',
          'name' => 'required|min:3|max:100',
        ]);
    
        if ($validator->fails()) {
          $errors = $this->parseValidator($validator);
          return $this->sendError($errors, 'Bad Request');
        }
    
        
        $user = new User();
    
        $user->email = $request->email;
        $user->password = app('hash')->make('ulanganku');
        if ($request->has('password') && $request->password != null && $request->password != "") {
          $user->password = app('hash')->make($request->password);
        }
        $user->id_role = $request->id_role;
        $user->name = $request->name;
        $user ->dk = $request->dk;
        $user->save();
    
        return $this->sendSuccess($this->getUser($user), 'Success');
      }
      private function getUser(User $user) {
        $user->role;
        unset($user->password);
        return $user;
      }
      public function GetAllUser(Request $request)
      {
        $user = User::all();
        return $this->sendSuccess([
          'user' => $user
        ], 'success');
      }
      public function delete(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->sendError([
                'user' => 'Data doesnt exists'
            ], 'Data doesnt exists');
        }
        $user->delete();
        return $this->sendSuccess(
            [
                'user' => $user
            ],
            'Data has been deleted'
      );
    }
    public function update(Request $request)
  {
    $input = $request->input();
    $users = (array) $request->auth_user;
    $user = User::where('email', $users['email'])->first();
    if (array_key_exists('password', $input)) {
      $password = $request->password;
        if (strlen($password) > 5) {
          $user->password = app('hash')->make($password);
        } else {
          return $this->sendError([
              'password' => 'The password must be at least 6 characters'
          ], 'Bad Request');
        }
    }

    if (array_key_exists('name', $input)) {
      $user->name = $request->name;
    }

    $user->save();

    return $this->sendSuccess($this->getUser($user));
  }
  public function getRole(Request $request)
  {
    $role = InitUserRole::all();

    return $this->sendSuccess([
      'role' => $role
    ], 'Success');
  }
  public function all(Request $request) {
    $query = User::where('is_active', 1);

    if ($request->has('id_role')) {
        $query->where('id_role', $request->input('id_role'));
    }

    $users = $query->get();


    foreach ($users as $user) {
      $this->getUser($user);
    }

    return $this->sendSuccess($users);
  }
}
