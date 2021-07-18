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
            'bg_color'  =>  'warning',
            'text_color'=>  ''
        ]);
        
        ReservationState::create([
            'name'      =>  'devuelto',
            'bg_color'  =>  'success',
            'text_color'=>  ''
        ]);
        
        ReservationState::create([
            'name'      => 'sancionado sin devolder',
            'bg_color'  =>  'danger',
            'text_color'=>  ''
        ]);

        ReservationState::create([
            'name'      => 'sancionado devuelto',
            'bg_color'  =>  'info',
            'text_color'=>  ''
        ]);
    }
}
