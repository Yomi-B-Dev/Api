<?php

use App\Models\Entities\Post;
use App\Models\Entities\PostLink;
use Faker\Generator as Faker;

$factory->define(PostLink::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'url' => $faker->imageUrl(),
    ];
});
