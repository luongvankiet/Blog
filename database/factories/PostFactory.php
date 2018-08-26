<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
	$title = $faker->sentence;
    $slug = str_slug($title,'-');
    return [
        'title' => $title,
        'slug' => $slug,
        'content' => $faker->paragraph(300),
        'like' => $faker->numberBetween($min = 0, $max = 200),
        'dislike' => $faker->numberBetween($min = 0, $max = 200),
        'user_id' =>  function(){
        	return factory(App\User::class)->create()->id;
        },
        'category_id' =>  function(){
        	return factory(App\Category::class)->create()->id;
        }
    ];
});
