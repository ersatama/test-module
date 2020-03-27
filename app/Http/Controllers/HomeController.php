<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Country\CountryRepositoryEloquent;
use App\Repositories\City\CityRepositoryEloquent;
use App\Repositories\Template\TemplateRepositoryEloquent;
use App\Repositories\ReceiverTemplate\ReceiverTemplateRepositoryEloquent;
use App\Repositories\Order\OrderRepositoryEloquent;

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

    public function __construct()
    {
        $this->middleware('auth');
        $this->country = new CountryRepositoryEloquent();
        $this->city = new CityRepositoryEloquent();
        $this->template = new TemplateRepositoryEloquent();
        $this->receiverTemplate = new ReceiverTemplateRepositoryEloquent();
        $this->order = new OrderRepositoryEloquent();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $countries = $this->country->all()->toArray();
        // $cities = $this->city::all()->toArray();
        //, compact('countries','cities')
        $orders = $this->order->all();
        return view('home.home', compact('orders'));
    }

    public function save(Request $request) {
        $this->template->save($request->input('template'),$request->input('sender'));
        return $this->order->save($request->input('sender'));

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
