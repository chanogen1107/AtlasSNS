<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
           [
            'username' => 'hoge',
            'mail' => 'hoge@aaa.com',
            'password' => bcrypt('hogehoge'),
       ],
        [
            'username' => 'huga',
            'mail' => 'huga@aaa.com',
            'password' => bcrypt('hugahuga'),
        ],
        [
            'username' => 'poya',
            'mail' => 'poya@aaa.com',
            'password' => bcrypt('poyapoya'),
        ],
        [
            'username' => 'piyo',
            'mail' => 'piyo@aaa.com',
            'password' => bcrypt('piyopiyo'),
        ]
       ]);
    }
}
