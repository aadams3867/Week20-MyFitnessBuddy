<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Meal extends Model
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Meal_Name', 'user_id', 'id'
    ];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function foods()
    {
    	return $this->hasMany(Food::class);
    }
}
