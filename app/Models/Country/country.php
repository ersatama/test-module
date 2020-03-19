<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    public function cities() {
        return $this->hasMany('App\Models\City\city');
    }
}
