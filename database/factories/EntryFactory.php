<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entry;
use Faker\Generator as Faker;

$factory->define(Entry::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence,
        'uid' => $faker->word . "-" . $faker->randomDigit,
        'content' => $faker->paragraph,
        'additional_notes' => $faker->paragraph,
        'created_by' => 1
    ];
});
