<?php

namespace Database\Seeders;

use App\Models\Challenge\Airline\Airline;
use App\Models\Challenge\Ticket\Ticket;
use App\Models\Core\Auth\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objAirline = [
            [
                'name' => 'Ticket 1',
                'description' => 'Descripción ticket 1',
                'hometown' => 'Guayaquil',
                'destination' => 'Quito',
                'exit_at' => '2022-05-10',
                'return_at' => '2022-05-15',
                'short_code_airline' => 'AIR1',
                'created_by' => 'user3@user.com',
            ],
            [
                'name' => 'Ticket 2',
                'description' => 'Descripción ticket 2',
                'hometown' => 'Guayaquil',
                'destination' => 'Cuenca',
                'exit_at' => '2022-05-01',
                'return_at' => '2022-05-05',
                'short_code_airline' => 'AIR2',
                'created_by' => 'user2@user.com',
            ],
            [
                'name' => 'Ticket 3',
                'description' => 'Descripción ticket 2',
                'hometown' => 'Guayaquil',
                'destination' => 'Ambato',
                'exit_at' => '2022-05-20',
                'return_at' => '2022-05-25',
                'short_code_airline' => 'AIR3',
                'created_by' => 'user2@user.com',
            ],
        ];

        foreach ($objAirline as $data) {
            $objUser = User::select('id')->where('email', $data["created_by"])->first();
            $objAirline = Airline::select('id')->where('short_code', $data["short_code_airline"])->first();
            Ticket::create([
                'name' => $data["name"],
                'description' =>  $data["description"],
                'hometown' => $data["hometown"],
                'destination' =>  $data["destination"],
                'exit_at' =>  $data["exit_at"],
                'return_at' =>  $data["return_at"],
                'created_by' => $objUser->id,
                'airline_id' =>  $objAirline->id,
            ]);
        }
    }
}
