<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class get_user_data_controller extends Controller
{
   public function get_data(Request $req)
   {
   
    $key=$req->token;
    
    $data=DB::table('users')->where('remember_token',$key)->get();
    $numrows=count($data);
    if($numrows>0)
    {
        $uid=$data[0]->uid;
        $data=DB::table('users')->select('name','email','gender')->where('uid',$uid)->get();

        return response(['message'=>$data]);


    }
    else{

        return response(['message'=>'you are not login or authenticated user']);

    }

    }
   
}
