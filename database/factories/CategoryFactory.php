<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['PHP', 'JavaScript', 'Laravel', 'Angular', 'Synfony', 'Vue.Js', 'Java', 'Django', 'Python', 'Diseño Web']),
        'description' => $faker->sentence
    ];
});
