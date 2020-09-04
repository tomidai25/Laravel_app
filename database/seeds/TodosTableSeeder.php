<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->truncate();
        DB::table('todos')->insert([
            [
                'title'      => 'laravel lessonを終わらせる',
                'created_at' => Carbon::create(2020, 6, 12),
                'updated_at' => Carbon::create(2020, 6, 30),
            ],
            [
                'title'      => 'レビューに向けて理解を深める',
                'created_at' => Carbon::create(2020, 7, 1),
                'updated_at' => Carbon::create(2020, 7, 5),
            ],
        ]);
        //
    }
}
