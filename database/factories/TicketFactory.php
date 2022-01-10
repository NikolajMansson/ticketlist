<?php

use Faker\Generator as Faker;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Ticket::class, function(Faker $faker)
    {
        return [
            'title' => $faker->text(50),
	'comment' => $faker->text(200),
	'author' => $faker->text(100),
	'open' => $faker->boolean()
        ];
    });
