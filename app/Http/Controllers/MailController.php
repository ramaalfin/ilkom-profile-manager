<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailDemo;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;


class MailController extends Controller
{
    public function sendEmail() {
        $email = 'ramaalfin7@gmail.com';
   
        $mailData = [
            'title' => 'Demo Email',
            'url' => 'https://www.positronx.io'
        ];
  
        Mail::to($email)->send(new EmailDemo($mailData));
   
        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }
}
