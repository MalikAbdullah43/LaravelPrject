<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;


class signup extends Controller
{

    /**
     * user signup function
     */
    public function user_signup(Request $req)
    {

        $validator=Validator::make($req->all(),[
            'name'=>'required|Alpha',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|min:8',
            'gender'=>'required|Alpha'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors()->toJson(),400);


        }

        

        $user=new user;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->gender=$req->gender;
        $user->status=$req->status;
        $user->token =$token = rand(100,1000);

        $user->save();
        
        $mail=$req->email;
        $this->sendmail($mail,$token);

        return $user;

    }

    /**
     * sending mail function
     */
    public function sendmail($mail,$token)
    {
        $details=[
            'title' => 'Please Verify Your Email',
            'body' => 'http://127.0.0.1:8000/api/verify/'.$mail.'/'.$token

        ];
    //     $em=Crypt::encryptString($mail);
    //     echo $em ;
    //     $emaa=Crypt::decryptString($em);

    //    echo $emaa;
        

        Mail::to($mail)->send(new TestMail($details));
        return "Email Sent Succesfully";

      

    }
}
