<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Connect;
use App\Study;
// use App\DB;
use DateTime;

class StudyDataController extends Controller
{
    public function information()
    {
        // $connect = new Connect;

        $languages = Study::where('language_or_content', 'language')->get();
        $languages_count = Study::where('language_or_content', 'language')->count();
        $languages_array = [];
        $study_languages_hours_array = [];
        for ($i = 0; $i < $languages_count; $i++) {
            $language_id = $languages[$i]->id;
            $language_arrays[] = $languages[$language_id - 1]->study;
            $study_languages_hours_array[] = Post::join('post_study', 'posts.id', '=', 'post_study.post_id')
                ->join('studies', 'post_study.study_id', '=', 'studies.id')
                ->where('user_id', 1)
                ->groupBy('study')
                ->where('study_id', $language_id)
                ->sum('hour');
        }
        dd($study_languages_hours_array);
    }

    public function index($user_id)
    {
        $user = User::where('id', $user_id)->get();

        //今日の勉強時間
        $today_study_hours = Post::where('user_id', $user_id)
            ->whereDate('day', date('Y-m-d'))
            ->sum('hour');
        // dd($today_study_hours);

        //今月の勉強時間
        $month_study_hours = Post::where('user_id', $user_id)
            ->whereYear('day', date('Y'))
            ->whereMonth('day', date('m'))
            ->sum('hour');

        //総勉強時間
        $total_study_hours = Post::where('user_id', $user_id)->sum('hour');

        //学習言語
        $languages = Study::where('language_or_content', 'language')->get();
        $languages_count = Study::where('language_or_content', 'language')->count();
        $languages_array = [];
        $study_languages_hours_array = [];
        for ($i = 0; $i < $languages_count; $i++) {
            $language_id = $languages[$i]->id;
            $language_arrays[] = $languages[$language_id - 1]->study;
            $study_languages_hours_array[] = Post::join('post_study', 'posts.id', '=', 'post_study.post_id')
                ->join('studies', 'post_study.study_id', '=', 'studies.id')
                ->where('user_id', 1)
                ->groupBy('study')
                ->where('study_id', $language_id)
                ->sum('hour');
        }
        // dd($study_languages_hours_array);

        return view('webapp', [
            'user_id' => $user_id,
            'user' => $user,
            'today_study_hours' => $today_study_hours,
            'month_study_hours' => $month_study_hours,
            'total_study_hours' => $total_study_hours,
            'study_languages_hours_array'=>$study_languages_hours_array
        ]);
    }
}
