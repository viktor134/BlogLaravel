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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];

});

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->sentence,
        'image'=>'photo1.png',
        'date'=>'08/09/17',
        'views'=>$faker->numberBetween(0,5000),
        'category_id' => 1,
        'user_id' =>  1,
        'status'=>1,
        'is_featured'=> 0

    ];

});        //generation fake date post model


$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->word,


    ];

});

$factory->define(\App\Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->word,


    ];

});
