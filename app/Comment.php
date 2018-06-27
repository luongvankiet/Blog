<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';
	protected $fillable = ['content', 'user_id', 'post_id'];
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
        public function posts()
    {
    	return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
