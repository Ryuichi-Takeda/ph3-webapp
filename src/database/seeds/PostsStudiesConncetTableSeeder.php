<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsStudiesConnectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['post_id'=>1,'study_id'=>3],
            ['post_id'=>2,'study_id'=>1],
            ['post_id'=>2,'study_id'=>2],
            ['post_id'=>2,'study_id'=>3],
            ['post_id'=>3,'study_id'=>2],
            ['post_id'=>4,'study_id'=>8],
            ['post_id'=>5,'study_id'=>1],
            ['post_id'=>5,'study_id'=>2],
            ['post_id'=>5,'study_id'=>3],
            ['post_id'=>6,'study_id'=>1],
            ['post_id'=>6,'study_id'=>3],
            ['post_id'=>7,'study_id'=>4],
            ['post_id'=>7,'study_id'=>6],
            ['post_id'=>8,'study_id'=>4],
            ['post_id'=>8,'study_id'=>6],
            ['post_id'=>9,'study_id'=>4],
            ['post_id'=>9,'study_id'=>6],
        ];
        DB::table('posts_studies_connect')->insert($param);
    }
}
