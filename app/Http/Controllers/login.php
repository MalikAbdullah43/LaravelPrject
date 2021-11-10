<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class login extends Controller
{
    public function user_login(Request $req)
    {
        
        
        $email=$req->email;
        $password=$req->password;
        $data = DB::table('users')->where('email',$email)->get();

        $dpsw = $data[0]->password;
        $count = count($data);

/*
 * checking hash password with simple 
 */
        if (Hash::check($password, $dpsw)) {

            $key = "waqas-123";
            $payload = array(
                "iss" => "localhost",
                "aud" => "users",
                "iat" => time(),
                "nbf" => 1357000000
            );
            
            $token = JWT::encode($payload, $key, 'HS256');
            //echo $jwt;
            DB::table('users')->where('email',$email)->update(['status'=>true]);
            DB::table('users')->where('email',$email)->update(['remember_token'=>$token]);

            return response()->json(['access_token'=>$token , 'message'=> 'successfuly login']);
            //return 'Succesfully login';
            
          }
        else{
            return "your credentials are not valid";
        } 



    

   

    }
}
