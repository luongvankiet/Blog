<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $primaryKey = 'id';

    public function users()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }

   	public function categories(){
    	return $this->belongsTo('App\Category','category_id','id');
    }

    public function images(){
    	return $this->hasMany('App\Image','post_id','id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }
}
