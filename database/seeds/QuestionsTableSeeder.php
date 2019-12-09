<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->truncate();
        DB::table('questions')->insert([
            [
                'user_id' => 4,
                'tag_category_id' => 1,
                'title' => 'test1',
                'content' => 'test1',
            ],
            [
                'user_id' => 4,
                'tag_category_id' => 1,
                'title' => 'test2',
                'content' => 'test2',
            ],
        ]);

        factory(App\Models\Question::class, 30)->create();
    }
}
