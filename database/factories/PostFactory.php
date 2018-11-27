<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Models\Entities\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'view_count' => $faker->numberBetween(1, 50),
        'target' => $faker->word(),
        'title' => $faker->sentence(2),
        'content' => $faker->paragraph(),
        'timestamp' => Carbon::now(),
        'type' => 'live',
    ];
});
