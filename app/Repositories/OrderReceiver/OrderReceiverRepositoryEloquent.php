<?php


namespace App\Repositories\OrderReceiver;

use App\Models\OrderReceiver\OrderReceiver;
use Illuminate\Support\Facades\Auth;

class OrderReceiverRepositoryEloquent implements OrderReceiverRepositoryInterface
{
    public function save(int $id, array $receiver): void
    {
        /*
         [ { "template": "mdadadada", "placeholder": "940603300487_1_30-03-2020_13:59:21", "data": "940603300487_1_30-03-2020_13:59:21", "name": "mdada", "saveTemplate": true, "type": 1, "status": true, "iin": "asd", "code": null, "countries": [ { "id": 1, "short_name": "kz", "name": "kazakstan", "russian_name": "казахстан", "kazakh_name": "казакстан", "created_at": "2020-03-23 20:53:09", "updated_at": "2020-03-23 20:53:09" }, { "id": 2, "short_name": "ru", "name": "russian", "russian_name": "россия", "kazakh_name": "ресей", "created_at": "2020-03-23 20:53:09", "updated_at": "2020-03-23 20:53:09" } ], "country": 1, "region": "asd", "cities": [ { "id": 1, "country_id": 1, "name": "almaty", "russian_name": "алматы", "kazakh_name": "алматы" } ], "city": 1, "index": null, "house": "asd", "street": "asd", "office": null, "contactPerson": { "name": "asd", "phone": "asd" }, "info": { "place": "asd", "weight": "dd", "volume": "d", "annotation": null }, "payment": { "personType": 0, "typeList": [ "Перечислением на счет", "Банковской картой", "Наличными" ], "type": 0 }, "deliver": { "type": 0, "payment": null, "price": null } } ]
         */

        foreach ($receiver as &$value) {
            $order = new OrderReceiver;
            $order->user = Auth::id();
            $order->order = $id;
            $order->type = $value['type'];
            $order->status = $value['status'];
            $order->name = $value['name'];
            $order->iin = $value['iin'];
            $order->code = $value['code'];
            $order->country = $value['country'];
            $order->region = $value['region'];
            $order->city = $value['city'];
            $order->index = $value['index'];
            $order->house = $value['house'];
            $order->street = $value['street'];
            $order->office = $value['office'];
            $order->person_name = $value['contactPerson']['name'];
            $order->person_phone = $value['contactPerson']['phone'];
            $order->place = $value['info']['place'];
            $order->weight = $value['info']['weight'];
            $order->volume = $value['info']['volume'];
            $order->annotation = $value['info']['annotation'];
            $order->payment_person_type = $value['payment']['personType'];
            $order->payment_type = $value['payment']['type'];
            $order->deliver_type = $value['deliver']['type'];
            $order->deliver_payment = $value['deliver']['payment'];
            $order->deliver_price = $value['deliver']['price'];
            $order->status = 1;
            $order->save();
        }

    }

    public function getCountryIds(array $data):array {
        $arr = [];
        foreach($data as $key=>$value) {
            $arr[] = $value['country'];
        }
        return $arr;
    }

    public function getCityIds(array $data):array {
        $arr = [];
        foreach($data as $key=>$value) {
            $arr[] = $value['city'];
        }
        return $arr;
    }

    public function getOrderReceiverById(int $id): array
    {

        return [];

    }
}
