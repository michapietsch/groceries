<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Grocery;
use Faker\Generator as Faker;

$factory->define(Grocery::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence()
    ];
});
