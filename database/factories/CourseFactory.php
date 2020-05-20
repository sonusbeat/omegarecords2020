<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    $title = str_replace('.', '', $faker->sentence(6));
    return [
        'teacher_id' => rand(1, 10),
        'title' => $title,
        'permalink' => strtolower(str_replace(' ', '-', $title)),
        'image' => strtolower($faker->word).'.jpg',
        'image_alt' => str_replace('.', '', $faker->sentence(4)),
        'description' => $faker->sentence(16),
        'video' => 'Youtube Link',
        'overview' => $faker->sentence(25),
        'topics' => $faker->sentence(25),
        'content' => $faker->sentence(50),
        'position' => rand(1, 20),
        'price' => $faker->randomNumber(4),
        'start_date' => $faker->date()
    ];
});
