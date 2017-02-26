<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Contract extends Model
{
	use Notifiable;
	use SoftDeletes;
	
	public function client(){
		return $this->belongsTo('App\Client');
	}
}
