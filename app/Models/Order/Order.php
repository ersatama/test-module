<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function city()
    {
        return $this->hasOne('App\Models\City\City','id','city');
    }

    public function invoice()
    {
        return $this->hasOne('App\Models\Invoice\invoice','order','id');
    }

    public function receiver()
    {
        return $this->hasMany('App\Models\OrderReceiver\OrderReceiver','order','id');
        //,'order','id'
        return $this->hasManyThrough(
            'App\Models\City\city',
            'App\Models\OrderReceiver\OrderReceiver',
            'city',
            'id',
            'id',
            'order'
        );
    }

}
