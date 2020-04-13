<?php

namespace App\Models\OrderReceiver;

use Illuminate\Database\Eloquent\Model;

class OrderReceiver extends Model
{
    public function city() {
        return $this->hasOne('App\Models\City\city');
    }

    public function getTypeAttribute($value) {

        if ($value === 0) {
            return 'Физическое лицо';
        } else {
            return 'Юридическое лицо';
        }
    }

    public function getPaymentPersonTypeAttribute($value)
    {
        if ($value === 0) {
            return 'Отправителем';
        } else {
            return 'Получателем';
        }
    }

    public function getPaymentTypeAttribute($value)
    {
        if ($value === 0) {
            return 'Перечислением на счет';
        } elseif ($value === 1) {
            return 'Наличными';
        } else {
            return 'Наличными';
        }
    }

}
