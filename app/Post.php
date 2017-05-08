<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

	Public function user(){
		return $this->belongsTo('App\Users','user_username','username');
	}

}
