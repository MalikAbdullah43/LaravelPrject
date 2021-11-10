<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class delete_post_controller extends Controller
{
    public function delete_post(Request $req)
    {
        $key=$req->token;
        $pid=$req->pid;
        $data=DB::table('users')->where('remember_token',$key)->get();
        $numrows=count($data);
        if($numrows>0)
        {
            $uid=$data[0]->uid;
            DB::table('posts')->where('pid',$pid)->delete();
            return response()->json(["messsage" => "Post deleted successfuly"]);
        }

        else{

            return response()->json(["messsage" => "you are not login so you cannot delete post"]);

        }
    }
}
