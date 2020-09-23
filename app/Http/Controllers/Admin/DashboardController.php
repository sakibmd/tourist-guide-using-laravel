<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Guide;
use App\Http\Controllers\Controller;
use App\Package;
use App\Place;
use App\Placetype;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $districts = District::latest()->get();
        $placetypes = Placetype::latest()->get();
        $places = Place::latest()->get();
        $packages = Package::latest()->get();
        $users = User::where('role_id', 2)->latest()->get();
        $guides = Guide::latest()->get();
        return view('admin.dashboard', compact('districts', 'placetypes', 'places', 'packages', 'users', 'guides'));
    }
}
