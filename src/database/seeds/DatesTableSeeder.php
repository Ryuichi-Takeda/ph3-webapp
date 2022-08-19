<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['day'=>'2022-02-11'],
            ['day'=>'2022-02-20'],
            ['day'=>'2022-03-11'],
            ['day'=>'2022-03-14'],
            ['day'=>'2022-03-17'],
            ['day'=>'2022-03-19'],
        ];
        DB::table('dates')->insert($param);
    }
}
