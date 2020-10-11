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
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        $districtcount = District::all()->count();
        return view('user.district.index',compact('districts', 'districtcount'));
    }

    public function getPlaceType(){
        $types = Placetype::latest()->paginate(8);
        $typescount = Placetype::all()->count();
        return view('user.placeType.index',compact('types', 'typescount'));
    }

    public function getPlaces(){
        $places = Place::latest()->paginate(8);
        $placeCount = Place::all()->count();
        return view('user.place.index',compact('places', 'placeCount'));
    }

    public function getPlaceDetails($id){
        $place = Place::find($id);
        return view('user.place.show',compact('place'));
    }


    public function getGuides(){
        $guides = Guide::latest()->paginate(8);
        $guideCount = Guide::all()->count();
        return view('user.guide.index',compact('guides', 'guideCount'));
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

    public function showProfile(){
        $user = User::find(Auth::id());
        return view('user.profile.index', compact('user'));
    }

    public function editProfile($id){
        $user = User::find($id);
        return view('user.profile.edit', compact('user'));
    }


    public function updateProfile(Request $request){
        $profile = Auth::id();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email,'. $profile,
            'contact' => 'required|numeric|unique:users,contact,'. $profile,
            'image' => 'mimes:jpeg,png,jpg',
        ]);

        $profile = User::findOrFail($profile);

        //handle featured image
        $image = $request->file('image');
        if($image)
        {
             // Make Unique Name for Image 
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
  
          // Check Dir is exists
  
              if (!Storage::disk('public')->exists('profile_photo')) {
                 Storage::disk('public')->makeDirectory('profile_photo');
              }


              if(Storage::disk('public')->exists('profile_photo/'.$profile->image)){
                Storage::disk('public')->delete('profile_photo/'.$profile->image);
            }
  
  
              // Resize Image  and upload
              $cropImage = Image::make($image)->resize(300,400)->stream();
              Storage::disk('public')->put('profile_photo/'.$image_name,$cropImage);

              $profile->image = $image_name;
  
         }

        
        $profile->name =  $request->name;
        $profile->email =  $request->email;
        $profile->contact =  $request->contact;
        $profile->save();

        session()->flash('success', 'Profile Updated Successfully');
        return redirect(route('user.profile.show'));
    }


    
}
