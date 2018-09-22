<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) { //Model
    return [
    	'post_type' => $faker->randomElement(['formation', 'stage']),
        'titre' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'start_dt' => $faker->dateTime(),
        'end_dt' => $faker->dateTime(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5000.00),
        'nb_max_personne' => $faker->numberBetween(0, 30),
        'status' => $faker->randomElement(['unpublished', 'published'])
    ];
});
