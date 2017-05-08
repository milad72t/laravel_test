<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	use HasApiTokens, Notifiable; //manually
    protected $table = 'users';	

	 public function posts(){
         return $this->hasMany('App\Post','user_username','username');
      }
    
}
