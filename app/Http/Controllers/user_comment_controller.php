<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\comment;

class user_comment_controller extends Controller
{
    /**
     * creating a comment against a post
     */
    public function create_comment(Request $req)
    {

        $key=$req->token;
        $pid=$req->pid;
        $comment=$req->comment;
        $data=DB::table('users')->where('remember_token',$key)->get();
        $numrows=count($data);
        if($numrows>0)
        {
            $comments=new comment;
            $uid=$data[0]->uid;
            
               
            $path = $req->file('file')->store('post');    

            

            $comments->user_id=$uid;
            $comments->p_id=$pid;
            $comments->comment=$comment;
            $comments->file=$path;
            $comments->save();
            return response()->json(['message'=>'Commented Successfuly']);


        }
        else{

            return response()->json(['message'=>'you are not login']);
        }
    }

    /**
     * updating an existing comment
     */
    public function update_comment(Request $req)
    {

        $key=$req->token;
        $pid=$req->pid;
        $comment=$req->comment;
        $cid=$req->cid;
        $data=DB::table('users')->where('remember_token',$key)->get();
        $numrows=count($data);
        if($numrows>0){
        $uid=$data[0]->uid;
        $path = $req->file('file')->store('post');
           

            $updateDetails = [
                'user_id' => $uid,
                'file' => $path,
                'comment'=> $comment
            ];
            DB::table('comments')->where('cid',$cid)->update($updateDetails);

            return response()->json(["messsage" => "comment updated successfuly"]);
        }

        else{

            return response()->json(["messsage" => "you are not login"]);

        }
    }
}
