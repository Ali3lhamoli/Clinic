<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OneDoctorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $major = $request->only('major');
        $major = implode('', $major);
        $doctor = User::find($request->only('doctor_id'));
        $doctor =$doctor[0];
        return view('web.site.pages.doctors.doctor', compact(['doctor','major']));
    }
}
