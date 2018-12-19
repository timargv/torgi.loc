<?php

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'number' => $faker->numberBetween($min = 1, $max = 2147483647),
        'slug' => $faker->slug(),
        'parent_id' => null,
        'date_expiration' => '30.04.2019',
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
    ];

});
