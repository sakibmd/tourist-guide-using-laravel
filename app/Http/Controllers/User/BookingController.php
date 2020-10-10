<?php

namespace App\Http\Controllers\User;

use App\Booking;
use App\Guide;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function tourHistory(){
        $historyList = Booking::where('approved_status', 'yes')
                    ->where('tourist_id', Auth::id())
                    ->get();
        $currentDate = Carbon::now()->format('F d, Y');
        return view('user.booking.historyList', compact('historyList', 'currentDate'));
    }


    public function pendingBookingList(){
        $pendinglists = Booking::where('approved_status', 'no')->where('tourist_id', Auth::id())->get();
        return view('user.booking.pendinglist', compact('pendinglists'));
    }

    public function cancelBookingRequest($id){
        $req = Booking::find($id);

        $guide = Guide::find($req->guide_id);
        $guide->status = 1;
        $guide->save();

        $req->delete();
        session()->flash('success', 'Booking Request Canceled Successfully');
        return redirect()->back();
    }
}
