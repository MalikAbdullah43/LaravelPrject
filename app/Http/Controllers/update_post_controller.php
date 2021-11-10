<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post;
use Illuminate\Support\Facades\DB;

class update_post_controller extends Controller
{
    public function index(Request $req)
    {

        $key=$req->token;
        $pid=$req->pid;
        $data=DB::table('users')->where('remember_token',$key)->get();
        $numrows=count($data);
        if($numrows>0)
        {
            $uid=$data[0]->uid;
            $path = $req->file('file')->store('post');
            

            $updateDetails = [
                'user_id' => $uid,
                'file' => $path,
                'accessors' => $req->access
            ];
            DB::table('posts')->where('pid',$pid)->update($updateDetails);

            return response()->json(["messsage" => "Post updated successfuly"]);
        }

        else{

            return response()->json(["messsage" => "you are not login"]);

        }



    
    }
}
