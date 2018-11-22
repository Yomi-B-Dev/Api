<?php

use App\Models\Entities\PostImage;
use Faker\Generator as Faker;

$factory->define(PostImage::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl(),
        'post_id' => $faker->numberBetween(1, 30),
    ];
});
