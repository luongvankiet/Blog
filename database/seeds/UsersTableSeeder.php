<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 15)->create()->each(function($u) {
           $u->posts()->save(factory(App\Post::class)->make());
		   $u->images()->save(factory(App\Image::class)->make());
		});	
    }
}
