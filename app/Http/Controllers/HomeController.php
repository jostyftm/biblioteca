<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('dashboard.index');

        return view('home');
    }

    public function dashboard()
    {
        $states = Reservation::select('reservation_states.id AS state_id','reservation_states.name', DB::raw('COUNT(*) AS total'), 'reservation_states.bg_color')
        ->join('reservation_states', 'reservations.reservation_state_id', '=', 'reservation_states.id')
        ->groupBy('state_id', 'reservation_states.name', 'reservation_states.bg_color')
        ->get();
        
        $lastReservations = Reservation::with(['student.user', 'book', 'state'])
        ->orderBy('id', 'desc')
        ->take(10)
        ->get();
        
        return view('pages.admin.index', [
            'states'    =>  $states,
            'lastReservations'  =>  $lastReservations
        ]);
    }
}
