<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Connect;
use App\Study;
use DateTime;

class StudyDataController extends Controller
{
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
            ->whereYear('day', 2022)
            ->whereMonth('day', 10)
            ->sum('hour');

        //総勉強時間
        $total_study_hours = Post::where('user_id', $user_id)->sum('hour');

        // 棒グラフ学習時間
        $day_study_hours_array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        for ($i = 1; $i < 31; $i++) {
            $day_study_hour = Post::where('user_id', $user_id)
                ->whereYear('day', date('Y'))
                ->whereMonth('day', date('m'))
                ->whereDay('day', $i)
                ->sum('hour');
            $day_study_hours_array[$i - 1] = $day_study_hour;
        }

        //学習言語
        $languages = Study::where('language_or_content', 'language')->get();
        $languages_count = Study::where('language_or_content', 'language')->count();
        $languages_array = [];
        $study_languages_hours_array = [];
        for ($i = 0; $i < $languages_count; $i++) {
            $language_id = $languages[$i]->id;
            $language_arrays[] = $languages[$i]->study;
            $study_languages_hours_array[] = Post::join('post_study', 'posts.id', '=', 'post_study.post_id')
                ->join('studies', 'post_study.study_id', '=', 'studies.id')
                ->where('user_id', $user_id)
                ->groupBy('study')
                ->where('study_id', $language_id)
                ->sum('hour');
        }

        //学習コンテンツ
        $contents = Study::where('language_or_content', 'content')->get();
        $contents_count = Study::where('language_or_content', 'content')->count();
        $contents_array = [];
        $study_contents_hours_array = [];
        for ($i = 1; $i < $contents_count; $i++) {
            $content_id = $contents[$i]->id;
            $content_arrays[] = $contents[$i]->study;
            $study_contents_hours_array[] = Post::join('post_study', 'posts.id', '=', 'post_study.post_id')
                ->join('studies', 'post_study.study_id', '=', 'studies.id')
                ->where('user_id', $user_id)
                ->groupBy('study')
                ->where('study_id', $content_id)
                ->sum('hour');
        }

        return view('webapp', [
            'user_id' => $user_id,
            'user' => $user,
            'today_study_hours' => $today_study_hours,
            'month_study_hours' => $month_study_hours,
            'total_study_hours' => $total_study_hours,
            'study_languages_hours_array' => $study_languages_hours_array,
            'study_contents_hours_array' => $study_contents_hours_array,
            'day_study_hours_array' => $day_study_hours_array,
        ]);
    }
}
