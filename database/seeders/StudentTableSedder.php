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
            $student->reservations()->save(
                Reservation::factory()->create([
                    'student_id'            =>  $student->id,
                    'book_id'               =>  $books->random(),
                    'reservation_state_id'  =>  1,
                    'reservated_at'         =>  Carbon::now()
                ])
            );
        });
    }
}
