<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => 'Анкер рамный HRD-C 8x60 202341',
        'date_expiration' => '30.04.2019',
        'unit' => 'ШТ',
        'pcs' => 200,
        'price' => 42,

        'price_two' => 43,
        'price_three' => 44,
        'links' => 'https://google.com',
        'status' => 'Y',
        'user_id' => 1,
        'category_id' => 1,
    ];
});
