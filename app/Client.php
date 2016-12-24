<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use Notifiable;
    use SoftDeletes;

     protected $fillable = [
        'first_name', 'last_name','phone','cpr','address', 'avatar',
    ];

      public function users(){
        return $this->belongsToMany('App\User');
    }
     public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    //
        /**
     * Always capitalize the first name when we save it to the database
     */
    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucfirst($value);
    }

    /**
     * Always capitalize the last name when we save it to the database
     */
    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = ucfirst($value);
    }

        /**
     * Always capitalize the first name when we save it to the database
     */
    public function getCprAttribute($value) {
        $cpr = decrypt($value);
        $cpr = join('-', str_split($cpr, 6));
        return $cpr;
    }

    /**
     * Always capitalize the last name when we save it to the database
     */
    public function setCprAttribute($value) {
        $value = str_replace('-', '', $value);
        $this->attributes['cpr'] = encrypt($value);
    }
}
// TODO: Tilføj primære og sekundære kp fra users
// TODO: Vis Klient Dashboard