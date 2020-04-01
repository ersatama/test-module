<?php

namespace App\Models\OrderReceiver;

use Illuminate\Database\Eloquent\Model;

class OrderReceiver extends Model
{
    public function city() {
        return $this->hasOne('App\Models\City\city');
    }
}
