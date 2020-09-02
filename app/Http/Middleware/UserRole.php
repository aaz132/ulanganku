<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $client = 'api')
    {
      $user = User::select('id', 'id_role')->find($request->auth_user->id);
      $roles = explode(';', $role);
      // if ($user && $user->role->name == $role) {
      if ($user && array_search($user->role->name,$roles) !== false ) {
        return $next($request);
      } else {
        return $this->sendError([
          'role' => 'You don\'t have access'
        ], 'You don\'t have access', 403);
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
