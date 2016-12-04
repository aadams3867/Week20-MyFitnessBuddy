<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Food extends Model
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Food_Name', 'meal_id', 'Protein', 'Carbohydrates', 'Fat'
    ];

    public function meal()
    {
    	return $this->belongsTo('Meal');
    }
}
