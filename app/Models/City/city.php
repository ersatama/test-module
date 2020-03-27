<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
	public function order()
    {
        return $this->belongsTo('App\Models\Order\Order');
    }
}
