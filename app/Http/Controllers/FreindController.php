<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreindController extends Controller
{
    public function addFriend()
    {

       $key=$req->token;
       $fid=$req->fid;
        $data=DB::table('users')->where('remember_token',$key)->get();
        $numrows=count($data);
        if($numrows>0)
        {
            $uid=$data[0]->uid;
            DB::table('comments')->where('p_id',$pid)->delete();
            if(DB::table('posts')->where('pid',$pid)->delete()==1)
            {
                 return response()->json(["messsage" => "Post deleted successfuly"]);
            }
            else{
                 return response()->json(["messsage" => "You are not allowed to delete this post"]);
            }
        }
        else{

            return response()->json(["messsage" => "you are not login so you cannot delete post"]);

        }
    }
}
