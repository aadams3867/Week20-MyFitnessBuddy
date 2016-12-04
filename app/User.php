<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

/*    public function getAttribute($key)
    {
        $meal = Meal::where('user_id', '=', $this->attributes['id'])->first()->toArray();

        foreach ($meal as $attr => $value) {
            if (!array_key_exists($attr, $this->attributes)) {
                $this->attributes[$attr] = $value;
            }
        }

        return parent::getAttribute($key);
    }*/
}
