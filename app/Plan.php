<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	public function client(){
		return $this->belongsTo('App\Client');
	}
	
	public function tag(){
		return $this->belongsTo('App\Tag');
	}
}
