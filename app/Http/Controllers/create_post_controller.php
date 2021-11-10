<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class create_post_controller extends Controller
{
    public function create_post(Request $req)
    {
        $key=$req->token;
        $data=DB::table('users')->where('remember_token',$key)->get();
        $numrows=count($data);

        if($numrows == 1)
            {
        $uid=$data[0]->uid;
        $post = new post;
        $post->user_id=$uid;
        $path = $req->file('file')->store('post');
        $post->file = $path;
        $post->accessors=$req->access;
        $post->save();
        return response()->json(['message'=>'post created successfuly']);
            }

            else{

                return response()->json(['message'=>'you are not authenticated user']);

            }




        
        

    }
}
