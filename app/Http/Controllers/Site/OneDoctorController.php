<?php

namespace App\Http\Controllers\Site;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Site\BookingRequest;

class OneDoctorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show(Request $request)
    {
        $major = $request->only('major');
        $major = implode('', $major);
        $doctor = User::find($request->only('doctor_id'));
        $doctor =$doctor[0];
        return view('web.site.pages.doctors.doctor', compact(['doctor','major']));
    }

    public function store(BookingRequest $request){
        $user = Auth::id();
        $data = $request->validated();
        $data['patient_id'] = $user;
        Booking::create($data);
        return redirect()->back()->with('success', 'Booking successfully don\'t forgit the appointment');

    }
}
