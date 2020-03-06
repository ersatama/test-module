<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.home');
    }

    public function instruction() {
        return view('home.instruction.instruction');
    }

    public function profile() {
        return view('home.profile.profile');
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
