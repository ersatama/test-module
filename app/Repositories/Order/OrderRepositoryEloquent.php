<?php


namespace App\Repositories\Order;

use Illuminate\Support\Facades\Auth;
use App\Models\Order\Order;
use Carbon\Carbon;

class OrderRepositoryEloquent implements OrderRepositoryInterface
{
    public function all(): array
    {

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

        return Order::select('id','name','data')->where([['name',$name],['status',1]])->get()->toArray();

    }

}
