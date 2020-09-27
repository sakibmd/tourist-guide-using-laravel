<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::latest()->paginate(8);
        $districtcount = District::all()->count();
        return view('admin.district.index',compact('districts', 'districtcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.district.create');
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
            'name' => 'required|unique:districts'
            ]);
    
            $districts = new District();
            $districts->name = $request->name;
            $districts->save();
    
            return redirect(route('admin.district.index'))->with('success', 'District name inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {

         return view('admin.district.edit',compact('district',$district));
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
        $districts=District::find($id);
        $this->validate($request,[
            'name' => 'required|unique:districts,name,'.$districts->id,
            ]);
    
      
        $districts->name = $request->name;
        $districts->save();

         return redirect(route('admin.district.index'))->with('success', 'District Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        if($district->places->count() > 0){
            return redirect()->back()->with('danger', 'District cannot be deleted, because it has some places');
        } 

        $district->delete();
        return redirect(route('admin.district.index'))->with('success', 'District deleted Successfully');
    }
}
