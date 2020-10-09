<?php

namespace App\Http\Controllers;

use App\About;
use App\Booking;
use App\District;
use App\Guide;
use App\Package;
use App\Place;
use App\Placetype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $packages = Package::all()->take(3);
        $districts = District::latest()->get();

        return view('welcome', compact('places', 'packages', 'districts'));
    }

    public function districtWisePlace($id){
        $places = Place::where('district_id', $id)->get();
        $district = District::find($id);
        return view('showDistrictWise', compact('places', 'district'));
    }

    public function placetypeWisePlace($id){
        $places = Place::where('placetype_id', $id)->get();
        $placetype = Placetype::find($id);
        return view('showPlacetypetWise', compact('places', 'placetype'));
    }

    public function about()
    {
        if(About::all()->count() > 0){
            $about = About::all()->first();
            return view('about', compact('about'));
        }
        return view('about');
    }

    public function placeDdetails($id)
    {
        $place = Place::find($id);
        return view('placeDetails', compact('place'));
    }

    public function packageDetails($id)
    {
        $package = Package::find($id);
        return view('packageDetails', compact('package'));
    }

    public function allPlace(){
        $places = Place::latest()->paginate(12);
        return view('allPlaces', compact('places'));
    }


    public function allPackage(){
        $packages = Package::latest()->paginate(12);
        return view('allPackages', compact('packages'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $places = Place::where('name','LIKE',"%$query%")->get();
        return view('searchResult', compact('places'));
    }

    public function packageBooking($id){

       
        $guides = Guide::where('status', 1)->get();
        $package = Package::where('id', $id)->first();
        return view('bookingForm', compact('guides', 'package'));
    }

    public function storeBookingRequest(Request $request){
        //dd($request->all());

        $this->validate($request, [
            'guide' => 'required',
            'date' => 'required',
        ]);
    


        $guide_id = $request->guide;
        $date = $request->date;
        $package_id = $request->package_id;
        $package_name = $request->package_name;
        $package_price = $request->package_price;
        $day = $request->day;


        $book = new Booking();
        $book->package_name = $package_name;
        $book->price = $package_price;
        $book->date = $date;
        $book->package_id = $package_id;
        $book->guide_id = $guide_id;
        $book->day = $day;
        $book->tourist_id = Auth::id();
        $book->save();

        $guide = Guide::find($guide_id);
        $guide->status = 0;
        $guide->save();

        session()->flash('success', 'Your Booking Request Send Successfully, Please wait for admin approval');
        return redirect()->back();


    }
}
