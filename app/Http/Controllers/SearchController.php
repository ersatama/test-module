<?php

namespace App\Http\Controllers;

use App\Repositories\City\CityRepositoryEloquent;
use App\Repositories\Country\CountryRepositoryEloquent;
use App\Repositories\Deliver\DeliverRepositoryEloquent;
use Illuminate\Http\Request;
use App\Repositories\Order\OrderRepositoryEloquent;

class SearchController extends Controller
{

    protected $order;
    protected $deliver;
    protected $city;
    protected $country;

    public function __construct()
    {
        $this->order = new OrderRepositoryEloquent();
        $this->deliver = new DeliverRepositoryEloquent();
        $this->city = new CityRepositoryEloquent();
        $this->country = new CountryRepositoryEloquent();
    }

    public function ticket($id) {

        $ticket = preg_replace('/[^0-9]/', '', $id);
        if (trim($ticket) === '') $ticket = 0;
        $order = $this->order->getOrderById($ticket);
        $cityModel = $this->city;
        $deliverModel = $this->deliver;
        $countryModel = $this->country;
        return view('home.order.ticket', compact('order', 'ticket', 'cityModel', 'deliverModel', 'countryModel'));
    }

    public function search(Request $request) {
        $type = 0;
        if ($request->query('type')) {
            $typeQuery = preg_replace('/[^0-9]/', '', $request->query('type'));
            if ($typeQuery >= 0 || $typeQuery <= 2) {
                $type = $typeQuery;
            }
        }
        $query = '';
        if (trim($request->query('search')) !== '') {
            $query = $request->query('search');
        }

        $orders = $this->order->search($type,$query);
        $cityModel = $this->city;
        $deliverModel = $this->deliver;
        return view('home.search', compact('orders', 'cityModel', 'deliverModel', 'query'));
    }
}
