<?php

use App\Models\Entities\PostVideo;
use Faker\Generator as Faker;

$factory->define(PostVideo::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl(),
        'thumbnail' => $faker->imageUrl(),
        'post_id' => $faker->numberBetween(31, 50),
    ];
});
