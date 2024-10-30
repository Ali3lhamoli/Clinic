<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->input('major_id')){
            $doctors = Role::with('user')->where('major_id', $request->input('major_id'))->where('is_doctor', 1)->paginate(8)->appends($request->only('major_id'));
        }else{
            $doctors = Role::with('user')->where('is_doctor', 1)->orderBy('id','desc')->paginate(8);
        }
        return view('web.site.pages.doctors.index', compact('doctors'));
    }
}
