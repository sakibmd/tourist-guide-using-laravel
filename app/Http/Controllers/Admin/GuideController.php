<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Guide;
use Illuminate\Support\Carbon as SupportCarbon;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guide::latest()->paginate(8);
        $guideCount = Guide::all()->count();
        return view('admin.guide.index',compact('guides', 'guideCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
         return view('admin.guide.create');
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
            'name' => 'required',
            'nid' => 'required|unique:guides|numeric',
            'email' => 'required|unique:guides|email',
            'contact' => 'required|unique:guides|numeric',
            'address' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            
            ]);
    
            // Get Form Image
          $image = $request->file('image');

         
          if (isset($image)) {

                   
             // Make Unique Name for Image 
            $currentDate = Carbon::now()->toDateString();
            $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
  
          // Check Category Dir is exists
  
              if (!Storage::disk('public')->exists('guide')) {
                 Storage::disk('public')->makeDirectory('guide');
              }
  
  
              // Resize Image for category and upload
              $GuideImage = Image::make($image)->resize(180,210)->stream();
              Storage::disk('public')->put('guide/'.$imageName,$GuideImage);
  
     }else{
      $imageName = "default.png";
     }
  
    $guide = new Guide();
    //$students->user_id = Auth::id();
    $guide->name = $request->name;

    
    $guide->nid = $request->nid;
    $guide->image = $imageName;
    $guide->email = $request->email;
    $guide->contact = $request->contact;
    $guide->address = $request->address;
    $guide->save();
    return redirect(route('admin.guide.index'))->with('success', 'Guide Inserted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
    
      return view('admin.guide.show',compact('guide'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {

         return view('admin.guide.edit',compact('guide',$guide));
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
        $guide = Guide::find($id);
        $this->validate($request,[
            'name' => 'required',
            'nid' => 'required|numeric|unique:guides,nid,'.$guide->id,
            'email' => 'required|email|unique:guides,email,'.$guide->id,
            'contact' => 'required|numeric|unique:guides,contact,'.$guide->id,
            'address' => 'required',
            'image' => 'mimes:jpeg,png,jpg|image',
            ]);
    
      
        // Get Form Image
        $image = $request->file('image');
        if (isset($image)) {
        // Make Unique Name for Image 
        $currentDate = Carbon::now()->toDateString();
        $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
  
        // Check Category Dir is exists
        if (!Storage::disk('public')->exists('guide')) {
            Storage::disk('public')->makeDirectory('guide');
        }
  
        // Delete old post image
        if(Storage::disk('public')->exists('guide/'.$guide->image)){
            Storage::disk('public')->delete('guide/'.$guide->image);
        }
  
        // Resize Image for category and upload
        $GuideImage = Image::make($image)->resize(180,210)->stream();
        Storage::disk('public')->put('guide/'.$imageName,$GuideImage);
  
     }else{
        $imageName = $guide->image;
     }
  

    $guide->name = $request->name;
    $guide->nid = $request->nid;
    $guide->image = $imageName;
    $guide->email = $request->email;
    $guide->contact = $request->contact;
    $guide->address = $request->address;
    $guide->save();
    return redirect(route('admin.guide.index'))->with('success', 'Guide Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
         
        // Delete image
        if(Storage::disk('public')->exists('guide/'.$guide->image)){
                Storage::disk('public')->delete('guide/'.$guide->image);
        }

         $guide->delete();

        return redirect(route('admin.guide.index'))->with('success', 'Guide deleted Successfully');
    }
}
