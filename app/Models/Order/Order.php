<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function getTakeTimeAttribute($value) {

        if ($value == 0) {
            return 'До обеда';
        } elseif ($value == 1) {
            return 'После обеда';
        } else {
            return $value;
        }

    }

    public function city()
    {
        return $this->hasOne('App\Models\City\city','id','city');
    }

    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice\invoice','order','id');
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
