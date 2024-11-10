<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $bookings = Booking::with('user')->orderBy('id','desc')->paginate(5);
        // dd($bookings[1]['user']);
        return view('web.admin.sections.bookings.index',compact('bookings'));
    }

    public function destroy(Booking $booking){
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success','Booking deleted successfully');
    }
}
