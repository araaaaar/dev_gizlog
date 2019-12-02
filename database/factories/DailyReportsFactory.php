<?php

use Faker\Generator as Faker;

$factory->define(App\DailyReport::class, function (Faker $faker) {
    return [
        'user_id'        => '4',
        'title'          => $faker->title,
        'content'        => $faker->paragraph,
        'reporting_time' => $faker->dateTimeThisYear,
        'created_at'     => $faker->date,
        'updated_at'     => $faker->date,
    ];
});
