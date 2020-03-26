<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'nome' => $faker->unique()->word,
        'descricao' => $faker->sentence(),
        'preco' => 12.2,
    ];
});
