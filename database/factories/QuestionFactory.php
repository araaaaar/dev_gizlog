<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Question::class, function (Faker $faker) {
    return [
        'user_id' => 4,
        'tag_category_id' => $faker->numberBetween($min = 1, $max= 4),
        'title' => $faker->word,
        'content' => $faker->text,
    ];
});
