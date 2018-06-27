<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public function posts()
    {
    	return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
