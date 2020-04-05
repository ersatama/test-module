<?php


namespace App\Repositories\Invoice;

use Illuminate\Support\Facades\Auth;
use Ixudra\Curl\Facades\Curl;
use App\Models\Invoice\invoice;
use App\Models\Order\Order;
use App\Models\OrderReceiver\OrderReceiver;

class InvoiceRepositoryEloquent implements InvoiceRepositoryInterface
{
//    protected $server = 'http://91.215.136.138/spark_copy/hs';
    protected $order = '/integrationsite/order';
    protected $status = '/integrationsite/invoicestatus';
    protected $server = 'http://91.215.136.138/spark/hs';

    public function getStatusByInvoice(string $invoice, int $iin):string {
        return 'Присвоен Номер Заказа';
        $response = Curl::to(join('',[
            $this->server,
            $this->status,
            '?invoice_number='.$invoice.'&bin='.$iin
        ]))
            ->asJson()
            ->get();
        return $response->Status;
    }

    public function send(
        int $id,
        array $senderCountry,
        array $senderCity,
        array $receiversCountry,
        array $receiversCity,
        array $sender,
        array $receiver
    ): int {

        $arr = $this->convert($id, $senderCountry, $senderCity, $receiversCountry, $receiversCity, $sender, $receiver);

        $response = Curl::to(join('',[
            $this->server,
            $this->order
        ]))
            ->withData($arr)
            ->asJson( true )
            ->post();

        return $this->save($id, $response);
    }

    public function save(
        int $id,
        array $response
    ):int {
        $order_number = 0;
        if (array_key_exists('order_number', $response)) {
            $order_number = $response['order_number'];
            foreach($response['shippings'] as &$value) {
                $invoice = new invoice;
                $invoice->order = $id;
                $invoice->order_number = $order_number;
                $invoice->invoice_number = $value['invoice_number'];
                $invoice->invoice_status = $this->getStatusByInvoice($value['invoice_number'], Auth::user()->iin);
                $invoice->status = 1;
                $invoice->save();
            }
        } else {
            $order = Order::find($id);
            $order->delete();
            OrderReceiver::where('order','=',$id)->delete();
        }
        return $order_number;
    }

    public function convert(
        int $id,
        array $senderCountry,
        array $senderCity,
        array $receiversCountry,
        array $receiversCity,
        array $sender,
        array $receiver
    ): array {

        return [
            'consignor' => $this->sender($sender, $senderCountry, $senderCity),
            'shippings' => $this->receiver($id, $receiversCountry, $receiversCity,  $receiver),
        ];

    }

    public function personType(
        int $type
    ):string {
        if ($type == 0) {
            return 'Физическое лицо';
        } else {
            return 'Юридическое лицо';
        }
    }

    public function sender(
        array $sender,
        array $senderCountry,
        array $senderCity
    ):array {
        return [
            'name'           => $sender['name'],
            'bin'            => $sender['iin'],
            'country'        => mb_strtoupper($senderCountry['russian_name']),
            'province'       => $sender['region'],
            'city'           => mb_convert_case($senderCity['russian_name'], MB_CASE_TITLE, "UTF-8"),
            'street'         => $sender['street'],
            'building'       => $sender['house'],
            'office'         => $sender['office'],
            'contact_person' => $sender['person']['name'],
            'contact_phone'  => $sender['person']['phone'],
            'take_date'      => date('Y-m-d', strtotime($sender['person']['take_date'])),
            'take_time'      => $sender['person']['take_time'],
            'post_index'     => $sender['index'],
        ];
    }

    public function receiver(
        int $id,
        array $receiversCountry,
        array $receiversCity,
        array $receiver
    ):array {

        $arr = [];
        foreach ($receiver as $key=>$value) {
            $arr[] = [
                'guid'     => $id,
                'receiver' => [
                    'rec_type'       => 'entity',
                    'consignor_code' => '',
                    'name'           => $value['name'],
                    'country'        => $this->findCountry($value['country'], $receiversCountry),
                    'province'       => $value['region'],
                    'city'           => $this->findCity($value['city'], $receiversCity),
                    'street'         => $value['street'],
                    'post_index'     => $value['index'],
                    'building'       => $value['house'],
                    'office'         => $value['office'],
                    'contact_person' => $value['contactPerson']['name'],
                    'contact_phone'  => $value['contactPerson']['phone'],
                    'type'           => $this->personType($value['type']),
                ],
                'cargo'    => [
                    'places'         => $value['info']['place'],
                    'weight'         => $value['info']['weight'],
                    'volume'         => $value['info']['volume'],
                    'annotation'     => $value['info']['annotation'],
                    'payment_method' => $value['payment']['typeList'][ $value['payment']['type'] ],
                    'payment_type'   => $this->paymentType($value['payment']['personType']),
                    'shipment_type'  => $this->shipmentType($value['deliver']['type']),
                    'cod'            => $value['code'],
                    'declared_price' => $value['deliver']['price']
                ],
            ];
        }
        return $arr;
    }

    public function findCity(
        int $cityId,
        array $receiversCity
    ):string {

        $city = '';
        foreach ($receiversCity as $key=>$value) {
            if ($value['id'] == $cityId) {
                $city = mb_convert_case($value['russian_name'], MB_CASE_TITLE, "UTF-8");
                break;
            }
        }
        return $city;

    }

    public function findCountry(
        int $countryId,
        array $receiversCountry
    ):string {

        $country = '';
        foreach ($receiversCountry as $key => $value) {
            if ($value['id'] == $countryId) {
                $country = mb_strtoupper($value['russian_name']);
                break;
            }
        }
        return $country;

    }

    public function shipmentType(
        int $type
    ):string {

        if ($type == 0) {
            return 'Стандарт';
        } elseif ($type == 1) {
            return 'Экспресс';
        } else {
            return 'Ускоренная ЖД';
        }

    }

    public function paymentType(
        int $type
    ):string {

        if ($type == 0) {
            return 'Отправителем';
        } else {
            return 'Получателем';
        }

    }
}
