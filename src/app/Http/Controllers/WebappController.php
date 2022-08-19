<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class WebappController extends Controller
{
    public function index($user_id)
    {
        $user = User::where('id',$user_id)->get();
        return view('webapp',['user_id'=>$user_id,'user'=>$user]);
    }
}
