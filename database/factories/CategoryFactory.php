<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $category_name = $faker->word();	
    $category_slug = str_slug($category_name,'-');
    return [
        'category_name' => $category_name,
        'category_slug' => $category_slug,
    ];
});
