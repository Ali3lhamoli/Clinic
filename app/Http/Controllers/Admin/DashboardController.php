<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $majors = Major::count();
        $users = User::count();
        $contacts = Contact::count();
        $bookings = Booking::count();
        return view('web.admin.pages.dashboard', compact('majors', 'users', 'contacts', 'bookings'));

    }
}
