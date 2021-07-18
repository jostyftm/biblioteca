<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\ReservationState;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $states = Reservation::select('reservation_states.id AS state_id','reservation_states.name', DB::raw('COUNT(*) AS total'))
        ->join('reservation_states', 'reservations.reservation_state_id', '=', 'reservation_states.id')
        ->groupBy('state_id', 'reservation_states.name')
        ->get();
        
        $reservations = Reservation::byState($request->sid)
        ->with(['student.user', 'book', 'state'])
        ->orderBy('id', 'desc')
        ->paginate(5);
        
        $path = $reservations->path();
        $newPath = isset($request->sid) ? "{$path}?sid={$request->sid}" : $path;
        
        $reservations->setPath($newPath);
        

        return view('pages.admin.reservation.index', [
            'reservations'      =>  $reservations,
            'all_reservations'  =>  Reservation::all()->count(),
            'states'            =>  $states,
            'tab_active'        =>  $request->sid
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReservationRequest $request)
    {  
        $student = Student::where('code', '=', $request->student_code)->first();
        $book = Book::where('code', '=', $request->book_code)->first();

        $reservation = $student->reservations()->create([
            'book_id'               =>  $book->id,
            'reservation_state_id'  =>  1,
            'reservated_at'         =>  Carbon::now()
        ]);

        $book->update([
            'copies' => ($book->copies - 1) 
        ]);

        return redirect()->route('reservations.index')
        ->with('success', 'Se ha realizado la reservación con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $reservation->student->user;
        $reservation->book;

        $states = ReservationState::all()->pluck('name', 'id');

        return view('pages.admin.reservation.edit', compact('reservation'))
        ->with('states', $states);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {

        if($request->reservation_state_id != $reservation->reservation_state_id){

            $book = $reservation->book;
            $copies = $book->copies;

            $reservation->fill($request->all());
            
            if($request->reservation_state_id == 1){
                $copies -= 1;
            }else if(
                $request->reservation_state_id == 2 || 
                $request->reservation_state_id == 4
            ){
                $copies += 1;
            }

            $book->update([
                'copies'    =>  $copies
            ]);
        }

        $reservation->reservated_at = ($request->reservated_at != null) ? new Carbon($request->reservated_at) : $reservation->getOriginal('reservated_at');
        $reservation->update();

        return redirect()->route('reservations.index')
        ->with('success', 'Se ha actualizado el prestamo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
