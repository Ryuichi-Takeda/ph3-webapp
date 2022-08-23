<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Connect;
use DateTime;

class WebappController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('webapp');
    // }

    public function show()
    {

        $user_id=Auth::user()->id;
        $user = User::where('id',  $user_id)->get();

        //今日の勉強時間
        $today_study_hours = Post::where('user_id',  $user_id)->whereDate('day', date('Y-m-d'))->sum('hour');
        // dd($today_study_hours);

        //今月の勉強時間
        $month_study_hours = Post::where('user_id',  $user_id)->whereYear('day', date('Y'))->whereMonth('day', date('m'))->sum('hour');

        //今年の勉強時間
        $total_study_hours = Post::where('user_id',  $user_id)->sum('hour');

        return view('webapp', [
            'user_id' =>  $user_id, 'user' => $user,
            'today_study_hours' => $today_study_hours, 'month_study_hours' => $month_study_hours,
            'total_study_hours' => $total_study_hours
        ]);
    }
}
