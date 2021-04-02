<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SistemFollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            [
                'following_id'=> 1,
                'follower_id' => 2,
            ],
            [
            'following_id' => 2,
            'follower_id' => 1
            ]
        ]);

        DB::table('posts')->insert([
            [
                'image'=> 'usertest2-1617015837.PNG',
                'caption' => 'userexample1 caption',
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'image'=> 'userexample1-1617074684.PNG',
                'caption' => 'userexample2 caption',
                'user_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'image'=> 'usertest2-1617006050.PNG',
                'caption' => 'userexample2 caption',
                'user_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
