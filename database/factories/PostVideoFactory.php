<?php

use App\Models\Entities\PostVideo;
use Faker\Generator as Faker;

$factory->define(PostVideo::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl(),
        'thumbnail' => $faker->imageUrl()
    ];
});
