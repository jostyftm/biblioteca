<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'      =>  'joe',
            'last_name' =>  'valencia',
            'email'     =>  'stiwart94@gmail.com',
            'password'  =>  bcrypt('password')
        ]);
    }
}
