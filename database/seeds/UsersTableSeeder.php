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
            'username' => 'aaaa',
            'mail' => 'aaaa@a.com',
            'password' => bcrypt('aaaa'),
       ],
        [
            'username' => 'bbbb',
            'mail' => 'bbbb@b.com',
            'password' => bcrypt('bbbb'),
        ],
        [
            'username' => 'cccc',
            'mail' => 'cccc@c.com',
            'password' => bcrypt('cccc'),
        ]
       ]);
    }
}
