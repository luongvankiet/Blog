<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    protected $table = 'likes_dislikes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'isLike', 'user_id', 'post_id',
    ];
    public function users()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function posts()
    {
    	return $this->belongsTo('App\Post','post_id','id');
    }
}
