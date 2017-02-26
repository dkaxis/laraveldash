<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
	use Notifiable;
	use SoftDeletes;
	
	//
	public function tags(){
		return $this->belongsToMany('App\Tag');
	}
	
	public function client(){
		return $this->belongsTo('App\Client');
	}
	
	public function user()
				    {
		return $this->belongsTo('App\User');
	}
}
