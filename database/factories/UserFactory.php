<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$gov_id = inc();

$factory->define(App\User::class, function (Faker $faker) use ($gov_id) {
    $gov_id->next();

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'gov_id' => md5($gov_id->current()),
        'phone' => $faker->unique()->phoneNumber,
        'role' => rand(0, 3)
    ];
});

function inc()
{
    for ($i = 770769;; $i++) {
        yield $i;
    }
}


