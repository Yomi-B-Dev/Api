<?php

use Faker\Generator as Faker;
use App\Models\Entities\GuestHelp;

$factory->define(GuestHelp::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence(),
        'answer' => $faker->paragraph()
    ];
});
