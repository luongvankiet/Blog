<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Post extends Model
{
    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'content', 'slug', 'rate', 'active', 'user_id', 'category_id'
    ];

    protected $rules = [
        'title' => 'required|max:255',
        'content' => 'required'
    ];

    protected $errors;


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

    public function likes_dislikes()
    {
        return $this->hasMany('App\LikeDislike', 'post_id', 'id');
    }

    public function validate($request)
    {
        $validator = Validator::make($request, $this->rules);
        if($validator->fails())
        {
            $this->errors = $validator->errors();
            return false;
        }
        return true;
    }
    
    public function errors()
    {
        return $this->errors;
    }
}
