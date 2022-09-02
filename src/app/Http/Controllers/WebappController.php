<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Connect;
use DateTime;

class WebappController extends Controller
{
    public function index($user_id)
    {
        $user = User::where('id', $user_id)->get();

        //今日の勉強時間
        $today_study_hours = Post::where('user_id', $user_id)->whereDate('day', date('Y-m-d'))->sum('hour');
        // dd($today_study_hours);

        //今月の勉強時間
        $month_study_hours = Post::where('user_id', $user_id)->whereYear('day', date('Y'))->whereMonth('day', date('m'))->sum('hour');

        //今年の勉強時間
        $total_study_hours = Post::where('user_id', $user_id)->sum('hour');


        // $day_study_hours = [];
        for($i=0;$i<=31;$i++){
        // $day_study_hour = Post::where('user_id', $user_id)->whereYear('day', date('Y'))->whereMonth('day', date('m'))
        // ->whereDay('day',$i)->sum('hour');
        // array_push($day_study_hours,$day_study_hour);
        }
        //modelでうんたんしてcontrollerで取得する
        // dd($day_study_hours_[17]);

        return view('webapp', [
            'user_id' => $user_id, 'user' => $user,
            'today_study_hours' => $today_study_hours, 'month_study_hours' => $month_study_hours,
            'total_study_hours' => $total_study_hours,
            'day_study_hours' => $day_study_hours
        ]);
    }
}
