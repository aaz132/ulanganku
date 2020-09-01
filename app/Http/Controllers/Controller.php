<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendSuccess($data, $message = '', $code = 200) {
        return response([
          'success' => true,
          'message' => $message,
          'data' => $data
        ], $code)->header('Content-Type', 'application/json');
    }
    public function sendError($error, $message, $code = 400) {
        return response([
            'success' => false,
            'message' => $message,
            'errors' => $error
        ], $code)->header('Content-Type', 'application/json');
    }
}
