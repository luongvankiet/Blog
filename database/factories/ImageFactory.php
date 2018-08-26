<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'image' => $faker->image('public/images',400,300, null, false),
        'image_type' => 2,
        'user_id' =>  function(){
        	return factory(App\User::class)->create()->id;
        },
        'post_id' =>  function(){
        	return factory(App\Post::class)->create()->id;
        }
    ];
});
