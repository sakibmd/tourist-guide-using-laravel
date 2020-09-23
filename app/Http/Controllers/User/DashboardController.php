<?php

namespace App\Http\Controllers\User;

use App\District;
use App\Http\Controllers\Controller;
use App\Placetype;
use Illuminate\Http\Request;
use App\Guide;
use App\Package;
use App\Place;
use App\User;

class DashboardController extends Controller
{
    public function index(){
        $districts = District::latest()->get();
        $placetypes = Placetype::latest()->get();
        $places = Place::latest()->get();
        $packages = Package::latest()->get();
        $guides = Guide::latest()->get();
        return view('user.dashboard', compact('districts', 'placetypes', 'places', 'packages', 'guides'));
    }

    public function getDistrict(){
        $districts = District::latest()->paginate(8);
        return view('user.district.index',compact('districts'));
    }

    public function getPlaceType(){
        $types = Placetype::latest()->paginate(8);
        return view('user.placeType.index',compact('types'));
    }

    public function getPlaces(){
        $places = Place::latest()->paginate(8);
        return view('user.place.index',compact('places'));
    }

    public function getPlaceDetails($id){
        $place = Place::find($id);
        return view('user.place.show',compact('place'));
    }


    public function getGuides(){
        $guides = Guide::latest()->paginate(8);
        return view('user.guide.index',compact('guides'));
    }

    public function getGuideDetails($id){
        $guide = Guide::find($id);
        return view('user.guide.show',compact('guide'));
    }


    public function getPackage(){
        $packages = Package::latest()->get();
        return view('user.package.index', compact('packages'));
    }


    public function getPackageDetails($id){
        $package = Package::find($id);
        return view('user.package.show', compact('package'));
    }
}
