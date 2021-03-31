<?php

namespace Database\Seeders;

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
    }
}
