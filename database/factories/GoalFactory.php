<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Goal;
use Faker\Generator as Faker;

$factory->define(Goal::class, function (Faker $faker) {
    return [
        'course_id' => \APP\Course::all()->random()->id,
        'rating' => $faker->randomFloat( 2, 1, 5 )
    ];
});
