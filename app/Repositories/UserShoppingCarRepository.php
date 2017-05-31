<?php

namespace App\Repositories;

use App\UserShoppingCar;

class UserShoppingCarRepository extends AbstractRepository
{
    function __construct(UserShoppingCar $model)
    {
        $this->model = $model;
    }

    public function search($params)
    {
        $query = $this->model
            ->select('users_shoppingcars.*');

        if(isset($params['user_id'])){
            $query->where('user_id', $params['user_id']);
        }

        if(isset($params['property_id'])){
            $query->where('property_id', $params['property_id']);
        }

        return $query->orderBy('created_at', 'desc');
    }
}