<?php

use Faker\Generator as Faker;
use App\Models\Entities\Leadership;
use App\Models\Entities\Movement;

$factory->define(Leadership::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->country(),
    ];
});


