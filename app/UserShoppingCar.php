<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserShoppingCar extends Model
{
    protected $table = 'users_shoppingcars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id', 'property_id', 'type'
    ];
}
