<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'username' => 'userexample1',
                    'fullname' => 'userexample1',
                    'email' => 'userexample1@test.test',
                    'bio' => 'ini adalah userexample1',
                    'avatar' => 'userexample1-1617074612.jpg ',
                    'password' =>  bcrypt('123123123123'),
                ],
                [
                    'username' => 'userexample2',
                    'fullname' => 'userexample2',
                    'email' => 'userexample2@test.test',
                    'bio' => 'ini adalah userexample2',
                    'avatar' => 'usertest2-1617001551.jpg',
                    'password' =>  bcrypt('123123123123'),
                ]
            ]
        );
    }
}
