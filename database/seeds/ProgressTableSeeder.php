<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProgressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i = 1;$i <= 10; $i++){
           DB::table('progress')->insert([
            'persent' => $i * 10 . '%',
            'created_at' => now(),
            'updated_at' => now()
           ]);
       }
    }
}
