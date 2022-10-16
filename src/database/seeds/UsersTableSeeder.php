<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['name'=>'武田龍一','email'=>'ryuichitakeda@posse.com','password'=>'ryuichitakeda'],
            ['name'=>'石川朝香','email'=>'asakaishikawa@posse.com','password'=>'asakaishikawa'],
            ['name'=>'松本透歩','email'=>'yukihomatumoto@posse.com','password'=>'yukihomatumoto'],
        ];
        DB::table('users')->insert($param);
    }
}
