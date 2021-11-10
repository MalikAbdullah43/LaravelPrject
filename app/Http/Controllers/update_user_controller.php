<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class update_user_controller extends Controller
{
    public function update_user(Request $req)
    {

        $key=$req->token;
        $pid=$req->pid;
        $data=DB::table('users')->where('remember_token',$key)->get();
        $numrows=count($data);
        if($numrows>0)
        {
            $password=Hash::make($req->password);
            $uid=$data[0]->uid;

           

            $updateDetails = [
                'name' => $req->name,
                'password' => $password
            ];
            DB::table('users')->where('uid',$uid)->update($updateDetails);

            return response()->json(["messsage" => "Post updated successfuly"]);
        }

        else{

            return response()->json(["messsage" => "you are not login"]);

        }



    
    }
}
