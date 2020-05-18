<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->sentence,
        'thumbnail' => 'photo1.png',
        'date' => '08/09/17', // password
        'views' => $faker->numberBetween(0, 5000),
        'category_id' => 1,
        'user_id' => 1,
        'status' => '1',
        'is_featured' => '0',
    ];
});
