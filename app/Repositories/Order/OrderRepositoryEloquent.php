<?php


namespace App\Repositories\Order;

use Illuminate\Support\Facades\Auth;
use App\Models\Order\Order;
use Carbon\Carbon;
use App\Models\Invoice\invoice;

class OrderRepositoryEloquent implements OrderRepositoryInterface
{
    protected $take = 30;

    public function search(int $type, string $query): array {

        $arr = [];
        if ($type === 0) {
            $invoice = invoice::where([['invoice_number','=',$query],['status','=',1]])->first();
            if ($invoice) {
                $invoice = $invoice->toArray();
                $arr = Order::with('city', 'invoice', 'receiver')
                    ->where([['user','=',Auth::id()],['id','=',$invoice['order']]])
                    ->get()
                    ->toArray();
            }
        } elseif ($type === 1) {
            $invoice = invoice::where([['order_number','=',$query],['status','=',1]])->first();
            $arr = Order::with('city', 'invoice', 'receiver')
                ->where([['user','=',Auth::id()],['id','=',$invoice['order']]])
                ->get()
                ->toArray();
        } else {
            $arr = Order::with('city', 'invoice', 'receiver')
                ->where([['user','=',Auth::id()],['id','=',$query]])
                ->get()
                ->toArray();
        }
        return $arr;

    }

    public function count():int {
        $limit = 0;
        $count = Order::where([['user','=',Auth::id()],['created_at','>',Carbon::now()->subDays(30)]])->count();
        if ($count) {
            $limit = intdiv($count,$this->take);
            $last = ($count%$this->take)>0?1:0;
            $limit += $last;
        }
        if ($limit > 10) $limit = 10;
        return $limit;
    }

    public function all(int $page): array
    {
        $skip = ($page-1)*$this->take;


        return Order::with('city', 'invoice', 'receiver')->where(
            [
                [
                    'user',
                    Auth::id()
                ]
            ]
        )
            ->whereDate('created_at', '>', Carbon::now()->subDays(30))
            ->orderBy('created_at','desc')
            ->skip($skip)
            ->take($this->take)
            ->get()
            ->toArray();

    }

    public function save(
        array $data
    ): int {

    	$order = new Order;
    	$order->user = Auth::id();
    	$order->name = $data['name'];
    	$order->iin = $data['iin'];
    	$order->country = $data['country'];
    	$order->region = $data['region'];
    	$order->city = $data['city'];
    	$order->index = $data['index'];
    	$order->street = $data['street'];
    	$order->house = $data['house'];
    	$order->person_name = $data['person']['name'];
    	$order->person_phone = $data['person']['phone'];
    	$order->take_date = $data['person']['take_date'];
    	$order->take_time = $data['person']['take_time'];
    	$order->save();
    	return $order->id;
    }

    public function getOrderById(
        int $id
    ): array {
        return Order::with('city', 'invoice', 'receiver')->where(
            [
                [
                    'user',
                    '=',
                    Auth::id()
                ],
                [
                    'id',
                    '=',
                    $id
                ]
            ]
        )
            ->get()
            ->toArray();

    }

}
