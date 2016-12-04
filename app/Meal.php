<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{

/*    public function user()
    {
    	return $this->belongsTo('User');
    }*/

    public function foods()
    {
    	return $this->hasMany(Food::class);
    }
}
