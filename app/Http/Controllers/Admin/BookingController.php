<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function pendingBookingList(){
        $pendinglists = Booking::where('approved_status', 'no')->get();
        return view('admin.booking.pendinglist', compact('pendinglists'));
    }

    public function bookingApprove($id){
        $req = Booking::find($id);
        $req->approved_status = "yes";
        $req->save();

        session()->flash('success', 'Booking Request Approved Successfully');
        return redirect()->back();
    }

    public function bookingRemoveByAdmin($id){
        Booking::find($id)->delete();
        session()->flash('success', 'Booking Request Removed Successfully');
        return redirect()->back();
        
    }


}
