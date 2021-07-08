<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StudentTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $books = Book::all()->pluck('id');

        Student::factory()
        ->count(30)
        ->create()
        ->each(function(Student $student) use ($books){
            $reservations = $student->reservations()->saveMany(
                Reservation::factory()->count(3)->create([
                    'student_id'        =>  $student->id,
                    'reservation_state' => 1,
                    'reservated_at'     =>  Carbon::now()
                ])
            );
            
            foreach($reservations as $reservation) {
                $reservation->books()->attach($books->random(3));
            }

        });
    }
}
