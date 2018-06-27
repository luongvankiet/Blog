<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'image' => base64_encode('http://lorempixel.com/400/200/technics/Dummy-Text'),
        'user_id' =>  function(){
        	return factory(App\User::class)->create()->id;
        },
        'post_id' =>  function(){
        	return factory(App\Post::class)->create()->id;
        }
    ];
});
