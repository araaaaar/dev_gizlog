<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DailyReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daily_reports')->truncate();
        DB::table('daily_reports')->insert([
            [
                'user_id'        => 1,
                'title'          => 'タイトル1',
                'content'        => '日報の内容1',
                'reporting_time' => Carbon::create(2019, 11, 1),
                'created_at'     => Carbon::create(2019, 11, 2),
                'updated_at'     => Carbon::create(2019, 11, 3),
                'deleted_at'     => Carbon::create(2019, 11, 4),
            ],
            [
                'user_id'        => 2,
                'title'          => 'タイトル2',
                'content'        => '日報の内容2',
                'reporting_time' => Carbon::create(2019, 11, 11),
                'created_at'     => Carbon::create(2019, 11, 12),
                'updated_at'     => Carbon::create(2019, 11, 13),
                'deleted_at'     => Carbon::create(2019, 11, 14),
            ]
        ]);
    }
}
