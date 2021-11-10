<?php

namespace App\Http\Controllers;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendmail()
    {
        $details=[
            'title' => 'hello from waqas',
            'body' => 'this is testing mail'
        ];


        Mail::to("buttw1510@gmail.com")->send(new TestMail($details));
        return "Email Sent Succesfully";

      

    }
}
