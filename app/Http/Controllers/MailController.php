<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function SendResetPasswordToken($user = '', $forgetPasswordToken)
    {
        if ($user == '') {
            return $this->sendError('','User not found');
        }

        $data =[
        'name' => $user->name,
        'email' => $user->email,
        'link' => env('APP_URL').'/reset-password/?fpt='.$forgetPasswordToken,
        'subject'=>"Password",
        'sender_email'=> env('MAIL_USERNAME'),
        'sender_name'=>"Ulanganku",
        ];
    
        // sending email
        Mail::send('email.forget-password', $data, function($message) use($data) {
            $message->to($data['email'],$data['name']);
            $message->subject($data['subject']);
            $message->from($data['sender_email'],$data['sender_name']);
        });
    
        if (Mail::failures()) {
        return $this->sendError('','Sending email failed');
        }
    }
}
