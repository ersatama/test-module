<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\Country\CountryRepositoryEloquent;
use App\Repositories\City\CityRepositoryEloquent;
use App\Repositories\Template\TemplateRepositoryEloquent;
use App\Repositories\ReceiverTemplate\ReceiverTemplateRepositoryEloquent;
use App\Repositories\Order\OrderRepositoryEloquent;
use App\Repositories\OrderReceiver\OrderReceiverRepositoryEloquent;
use App\Repositories\Invoice\InvoiceRepositoryEloquent;
use App\Repositories\Deliver\DeliverRepositoryEloquent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $country;
    protected $city;
    protected $template;
    protected $receiverTemplate;
    protected $order;
    protected $orderReceiver;
    protected $invoice;
    protected $deliver;

    public function __construct()
    {
        $this->middleware('auth');
        $this->country = new CountryRepositoryEloquent();
        $this->city = new CityRepositoryEloquent();
        $this->template = new TemplateRepositoryEloquent();
        $this->receiverTemplate = new ReceiverTemplateRepositoryEloquent();
        $this->order = new OrderRepositoryEloquent();
        $this->orderReceiver = new OrderReceiverRepositoryEloquent();
        $this->invoice = new InvoiceRepositoryEloquent();
        $this->deliver = new DeliverRepositoryEloquent();
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $type = 0;
        if ($request->query('type')) {
            $type = $request->query('type');
        }
        $search = '';
        if ($request->query('search')) {
            $search = $request->query('search');
        }

        $page = 0;

        $max = 0;
        $query = '';
        $orders = $this->order->all();
        $ordersCount = $this->order->count($type, $search);

        $invoiceModel = $this->invoice;
        $cityModel = $this->city;
        $deliverModel = $this->deliver;


        return view('home.home', compact('orders', 'invoiceModel', 'cityModel', 'deliverModel', 'page', 'max', 'query'));

    }

    public function user() {
        return [
            Auth::id(),
            Auth::user()->iin,
            Auth::user()->name
        ];
    }

    public function save(Request $request) {

        $template = $request->input('template');
        $sender   = $request->input('sender');
        $receiver = $request->input('receiver');

        $this->template->save(
            $template,
            $sender
        );
        $this->receiverTemplate->save(
            $receiver
        );
        $orderId = $this->order->save(
            $sender
        );
        $senderCountry = $this->country->getCountryById(
            $sender['country']
        );
        $senderCity = $this->city->getCityById(
            $sender['city']
        );
        $receiversCountryIds = $this->orderReceiver->getCountryIds(
            $receiver
        );
        $receiversCountry = $this->country->getCountriesByIds(
            $receiversCountryIds
        );
        $receiversCityIds = $this->orderReceiver->getCityIds(
            $receiver
        );
        $receiversCity = $this->city->getCitiesByIds(
            $receiversCityIds
        );
        $this->orderReceiver->save(
            $orderId,
            $receiver
        );
        $this->invoice->send(
            $orderId,
            $senderCountry,
            $senderCity,
            $receiversCountry,
            $receiversCity,
            $sender,
            $receiver
        );
        return $orderId;

    }

    public function instruction() {
        return view('home.instruction.instruction');
    }

    public function profile() {
        return view('home.profile.profile');
    }

    public function countries() {
        return $this->country->all();
    }

    public function getCities($id) {
        return $this->city->getCitiesByCountryId($id);
    }

    public function receiver($id) {
        return view('layouts.receiver',compact('id'));
    }

    public function receiverTemplates() {
        return $this->receiverTemplate->all();
    }

    public function getReceiverTemplateByName($name) {
        return $this->receiverTemplate->getTemplateByName($name);
    }

    public function getTemplateByName($name) {
        return $this->template->getTemplateByName($name);
    }

    public function order() {
        $countries = $this->country->all();
        $templates = $this->template->all();
        return view('home.order.order', compact('countries','templates'));
    }

    public function changePassword(Request $request) {

        if ($request->has('old')) {

            $validatedDate = $request->validate([
                'old' => ['required', 'string', 'min:8'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            return $validatedDate->fails();

            if ($validatedDate->fails()) {
                return redirect('home/profile/profile')
                    ->withErrors($validatedDate)
                    ->withInput();
            } else {
                return redirect('home/instruction/instruction');
            }

        }

        if ($request->has('name')) {
            $info = '';
            $validatedDate = $request->validate([
                'old' => ['required', 'string', 'min:8'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

        }

    }
}
