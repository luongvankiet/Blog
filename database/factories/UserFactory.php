<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\Role;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('password'), // secret
        'description' => $faker->paragraph(200),
        'remember_token' => str_random(10),
        'date_of_birth' => $faker->date,
    ];
});
