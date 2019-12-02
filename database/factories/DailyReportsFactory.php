<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id'        => function () {
            return factory(App\User::class)->create()->id;
        },
        'title'          => $faker->title,
        'content'        => $faker->paragraph,
        'reporting_time' => $faker->date,
        'created_at'     => $faker->date,
        'updated_at'     => $faker->date,
        'deleted_at'     => $faker->date,
    ];
});
