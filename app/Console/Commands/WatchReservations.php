<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Illuminate\Console\Command;

class WatchReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservation:watch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revisando el estado de los prestamos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Reservation::whereRaw('TIMESTAMPDIFF(DAY, reservated_at, NOW()) >=  ?', 5)
        ->update([
            'reservation_state_id'  =>  '3'
        ]);
    }
}
