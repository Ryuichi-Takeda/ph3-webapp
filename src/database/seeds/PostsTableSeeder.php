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
            ['comment'=>'難しかった','hour'=>1,'day'=>'2022-07-11','user_id'=>1],
            ['comment'=>'','hour'=>3,'day'=>'2022-09-11','user_id'=>1],
            ['comment'=>'','hour'=>2,'day'=>'2022-09-11','user_id'=>2],
            ['comment'=>'','hour'=>4,'day'=>'2022-09-20','user_id'=>1],
            ['comment'=>'','hour'=>1,'day'=>'2022-10-11','user_id'=>2],
            ['comment'=>'終わった','hour'=>6,'day'=>'2022-10-14','user_id'=>2],
            ['comment'=>'終わった','hour'=>4,'day'=>'2022-10-17','user_id'=>2],
            ['comment'=>'','hour'=>4,'day'=>'2022-10-17','user_id'=>3],
            ['comment'=>'','hour'=>4,'day'=>'2022-10-21','user_id'=>3],
            ['comment'=>'','hour'=>7,'day'=>'2022-10-28','user_id'=>3],
            ['comment'=>'','hour'=>4,'day'=>'2022-10-21','user_id'=>1],
            ['comment'=>'','hour'=>1,'day'=>'2022-10-21','user_id'=>1],
            ['comment'=>'','hour'=>4,'day'=>'2022-10-22','user_id'=>1],
            ['comment'=>'','hour'=>5,'day'=>'2022-10-23','user_id'=>1],
            ['comment'=>'','hour'=>8,'day'=>'2022-10-24','user_id'=>1],
            ['comment'=>'','hour'=>3,'day'=>'2022-10-25','user_id'=>1],
        ];
        DB::table('posts')->insert($param);
    }
}
