<?php

use Faker\Generator as Faker;
use App\Models\Entities\Grade;
use App\Models\Entities\Tribe;

$factory->define(Grade::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->streetName(),
    ];
});
