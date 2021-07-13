<?php

namespace Database\Seeders;

use App\Models\ReservationState;
use Illuminate\Database\Seeder;

class ReservationStaeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationState::create([
            'name'      => 'prestado',
            'bg_color'  =>  'badge-warning',
            'text_color'=>  ''
        ]);
        
        ReservationState::create([
            'name'      =>  'devuelto',
            'bg_color'  =>  'badge-success',
            'text_color'=>  ''
        ]);
        
        ReservationState::create([
            'name'      => 'sancionado',
            'bg_color'  =>  'badge-danger',
            'text_color'=>  ''
        ]);
    }
}
