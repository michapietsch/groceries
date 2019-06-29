<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Storage;
use Faker\Generator as Faker;

$factory->define(Storage::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence()
    ];
});
