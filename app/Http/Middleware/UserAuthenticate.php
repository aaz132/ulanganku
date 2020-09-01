<?php

namespace App\Http\Middleware;

use Closure;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Cookie;

class UserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $client)
    {
      if ($client == 'api') {
        $jwt = $request->header('Authorization');
      } else if ($client == 'web') {
        $jwt = Cookie::get('ByoToken');
      }
      $key = env('JWT_KEY_USER');
      // dd($jwt);
      if ($jwt == '') {
        if ($client == 'api') {
          return $this->sendError([
            'token' => 'invalid token'
          ], 'invalid token', 401);
        } else {
          return redirect('/visitor');
        }
      }
      try {
        $admin = JWT::decode($jwt, $key, array('HS256'));
        $request->auth_user = $admin;
        return $next($request);
      } catch (\Exception $e) {
        if ($client == 'api') {
          
          return $this->sendError([
            'token' => 'invalid tokennn'
          ], 'invalid token', 401);
        } else {
          return redirect('/');
        }
      }
    }

    public function sendError($data, $message = '', $code = 400)
    {
      return response()->json([
        'success' => false,
        'data' => null,
        'errors' => $data,
        'message' => $message
      ], 401);
    }

}
