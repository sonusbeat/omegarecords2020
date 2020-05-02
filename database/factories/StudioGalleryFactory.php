<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StudioGallery;
use Faker\Generator as Faker;

$factory->define(StudioGallery::class, function (Faker $faker) {
    $title = $faker->sentence();

    return [
        'title' => $title,
        'slug' => str_replace([' '  , '.'], '-', strtolower($title)),
        'image' => $faker->image(null, null, null, null, false, true, true),
        'image_alt' => $title,
        'description' => $faker->text(150),
        'active' => $faker->boolean(50),
    ];
});
