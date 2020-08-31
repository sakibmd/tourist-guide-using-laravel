<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Placetype;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Placetype::latest()->paginate(8);
        return view('admin.placeType.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.placeType.create');
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
            'name' => 'required|unique:placetypes'
            ]);
    
            $types = new Placetype();
            $types->name = $request->name;
            $types->save();
    
            return redirect(route('admin.type.index'))->with('successMsg', 'PlaceType name inserted successfully');
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
    public function edit(Placetype $type)
    {
       return view('admin.placeType.edit',compact('type',$type));
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
        $types=Placetype::find($id);
        $this->validate($request,[
            'name' => 'required|unique:placetypes,name,'.$types->id,
            ]);
    
      
        $types->name = $request->name;
        $types->save();

         return redirect(route('admin.type.index'))->with('successMsg', 'PlaceType Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Placetype $type)
    {
         $type->delete();

      return redirect(route('admin.type.index'))->with('success', 'Placetype deleted Successfully');
    }
}
