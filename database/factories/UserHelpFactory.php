<?php

use Faker\Generator as Faker;
use App\Models\Entities\UserHelp;

$factory->define(UserHelp::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence(),
        'answer' => $faker->paragraph()
    ];
});
