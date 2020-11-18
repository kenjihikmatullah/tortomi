<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++)
        {
            DB::table('articles')->insert([
                'user_id' => 1,
                'title' => Str::random(20),
                'body' => Str::random(500),
                'views' => 0
            ]);
        }
    }
}
