<?php

namespace App\Http\Controllers;

use App\About;
use App\Place;
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
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $places = Place::all()->take(4);
        return view('welcome', compact('places'));
    }

    public function about()
    {
        if(About::all()->count() > 0){
            $about = About::all()->first();
            return view('about', compact('about'));
        }
        return view('about');
    }

    public function details($id)
    {
        $place = Place::find($id);
        return view('placeDetails', compact('place'));
    }
}
