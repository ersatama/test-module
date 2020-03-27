<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function city()
    {
        return $this->hasOne('App\Models\City\City','id','city');
    }
}
