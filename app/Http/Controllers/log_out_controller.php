<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class log_out_controller extends Controller
{
    public function log_out(Request $req)
    {
        $key=$req->token;
        $data=DB::table('users')->where('remember_token',$key)->get();
        $numrows=count($data);
        if($numrows>0)
        {
            DB::table('users')->where('remember_token',$key)->update(['status'=>false]);
            DB::table('users')->where('remember_token',$key)->update(['remember_token'=>NULL]);
            return response()->json(['message'=>'logout successfuly']);
        }
        else{

            return response()->json(['message'=>'you are already logout']);
        }
    }
    
}
