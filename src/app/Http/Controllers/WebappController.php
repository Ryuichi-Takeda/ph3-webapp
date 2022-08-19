<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebappController extends Controller
{
    public function index($user_id)
    {
        return view('webapp',['user_id'=>$user_id]);
    }
}
