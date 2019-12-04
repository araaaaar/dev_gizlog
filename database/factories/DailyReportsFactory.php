<?php

use Faker\Generator as Faker;

$factory->define(App\Models\DailyReport::class, function (Faker $faker) {
    return [
        'user_id'        => '4',
        'title'          => $faker->word,
        'content'        => $faker->text,
        'reporting_time' => $faker->dateTimeBetween('-1 years', 'now'),
    ];
});
