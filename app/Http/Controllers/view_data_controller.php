<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class view_data_controller extends Controller
{

    public function get(Request $req)

    {
    $key=$req->token;
    $pid=$req->pid;
    $data=DB::table('users')->where('remember_token',$key)->get();
    $numrows=count($data);
    if($numrows>0)
    {
        $uid=$data[0]->uid;
        $data=DB::table('posts')->where('user_id',$uid)->get();

        return response(['message'=>$data]);


    }
    else{

        return response(['message'=>'you are not login or authenticated user']);

    }

    }
}
