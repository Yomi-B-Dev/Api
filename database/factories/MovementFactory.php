<?php

use Faker\Generator as Faker;
use App\Models\Entities\Movement;

$factory->define(Movement::class, function (Faker $faker) {
    return [
        'name' => 'Movement'
    ];
});

