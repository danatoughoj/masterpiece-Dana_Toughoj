<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
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

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => $faker->randomElement(Category::all()->pluck('id')->toArray()),
        'description' => 'this is a product description',
        'characteristics' => ["color" => "red", "width" => "12"],
        'price' => $faker->randomNumber(2),
        'in_stock' => $faker->randomNumber(2),
        'cover_image' => 'client/img/bg-img/1.jpg',
    ];
});
