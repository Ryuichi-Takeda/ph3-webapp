<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['comment'=>'難しかった','hour'=>1,'date_id'=>1,'user_id'=>1],
            ['comment'=>'','hour'=>3,'date_id'=>1,'user_id'=>1],
            ['comment'=>'','hour'=>2,'date_id'=>1,'user_id'=>2],
            ['comment'=>'','hour'=>4,'date_id'=>2,'user_id'=>1],
            ['comment'=>'','hour'=>1,'date_id'=>3,'user_id'=>2],
            ['comment'=>'終わった','hour'=>6,'date_id'=>4,'user_id'=>2],
            ['comment'=>'終わった','hour'=>4,'date_id'=>5,'user_id'=>2],
            ['comment'=>'','hour'=>4,'date_id'=>5,'user_id'=>3],
            ['comment'=>'','hour'=>4,'date_id'=>6,'user_id'=>3],
        ];
        DB::table('posts')->insert($param);
    }
}
