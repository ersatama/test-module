<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
	public function order()
    {
        return $this->belongsTo('App\Models\Order\Order', 'city','id');
    }

    public function orderReceiver()
    {
        return $this->belongsTo('App\Models\OrderReceiver\OrderReceiver','city','id');
    }
}
