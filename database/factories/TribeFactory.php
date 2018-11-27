<?php

use Faker\Generator as Faker;
use App\Models\Entities\Tribe;
use App\Models\Entities\Leadership;

$factory->define(Tribe::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city(),
    ];
});
