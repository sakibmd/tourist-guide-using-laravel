<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\Place;
use App\Placetype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::latest()->paginate(8);
        $placecount = Place::all()->count();
        return view('admin.place.index',compact('places', 'placecount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::latest()->get();
        $placetypes = Placetype::latest()->get();
        return view('admin.place.create',compact('districts', 'placetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required|unique:places',
                'district_id' => 'required',
                'placetype_id' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg',
                'description' => 'required',
            ]);
    
            // Get Form Image
          $image = $request->file('image');
          if (isset($image)) {

             // Make Unique Name for Image 
            $currentDate = Carbon::now()->toDateString();
            $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
  
          // Check Category Dir is exists
  
              if (!Storage::disk('public')->exists('place')) {
                 Storage::disk('public')->makeDirectory('place');
              }
  
  
              // Resize Image for category and upload
              $PlaceImage = Image::make($image)->resize(1000,600)->stream();
              Storage::disk('public')->put('place/'.$imageName,$PlaceImage);
  
     }else{
            $imageName = "default.png";
     }
  
    $place = new Place();
    $place->addedBy = Auth::user()->name;
    $place->name = $request->name;
    $place->district_id = $request->district_id;
    $place->placetype_id = $request->placetype_id;
    $place->description = $request->description;
    $place->image = $imageName;
    $place->save();
    return redirect(route('admin.place.index'))->with('success', 'Guide Inserted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return view('admin.place.show',compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        $districts = District::latest()->get();
        $placetypes = Placetype::latest()->get();
        return view('admin.place.edit',compact('place', 'districts', 'placetypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $place = Place::findOrFail($id);
        //dd($request->all());
        $this->validate($request,[
            'name' => 'required|unique:places,name,'.$place->id,
            'district_id' => 'required',
            'placetype_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'description' => 'required',
        ]);

        // Get Form Image
        $image = $request->file('image');
        if (isset($image)) {
                // Make Unique Name for Image 
                $currentDate = Carbon::now()->toDateString();
                $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        
        
                // Check Category Dir is exists
                if (!Storage::disk('public')->exists('place')) {
                    Storage::disk('public')->makeDirectory('place');
                }
        
                // Delete old post image
                if(Storage::disk('public')->exists('place/'.$place->image)){
                    Storage::disk('public')->delete('place/'.$place->image);
                }
        
                // Resize Image for category and upload
                $PlaceImage = Image::make($image)->resize(1000,600)->stream();
                Storage::disk('public')->put('place/'.$imageName,$PlaceImage);
        
        }else{
            $imageName = $place->image;
        }

        $place->name = $request->name;
        $place->district_id = $request->district_id;
        $place->placetype_id = $request->placetype_id;
        $place->description = $request->description;
        $place->image = $imageName;
        $place->save();
        return redirect(route('admin.place.index'))->with('success', 'Place Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
    
        $place->delete();
        return redirect(route('admin.place.index'))->with('success', 'Place Information deleted Successfully');
    }
}
