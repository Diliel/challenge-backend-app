<?php

namespace Database\Seeders;

use App\Models\Challenge\Airline\Airline;
use App\Models\Core\Auth\User;
use Illuminate\Database\Seeder;

class AirlineSeeder extends Seeder
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
                'name' => 'Aerolínea 1',
                'description' => 'Descripción aerolínea 1',
                'price' => '16.30',
                'scales' => '4',
                'duration_at' => '2022-05-10',
                'duration_end' => '2022-05-15',
                'short_code' => 'AIR1',
                'created_by' => 'user3@user.com',
            ],
            [
                'name' => 'Aerolínea 2',
                'description' => 'Descripción aerolínea 2',
                'price' => '17.20',
                'scales' => '5',
                'duration_at' => '2022-05-01',
                'duration_end' => '2022-05-05',
                'short_code' => 'AIR2',
                'created_by' => 'user2@user.com',
            ],
            [
                'name' => 'Aerolínea 3',
                'description' => 'Descripción aerolínea 2',
                'price' => '18.30',
                'scales' => '6',
                'duration_at' => '2022-05-20',
                'duration_end' => '2022-05-25',
                'short_code' => 'AIR3',
                'created_by' => 'user1@user.com',
            ],
        ];

        foreach ($objAirline as $data) {
            $objUser = User::select('id')->where('email', $data["created_by"])->first();
            Airline::create([
                'name' => $data["name"],
                'description' =>  $data["description"],
                'price' => $data["price"],
                'scales' =>  $data["scales"],
                'duration_at' =>  $data["duration_at"],
                'duration_end' =>  $data["duration_end"],
                'short_code' =>  $data["short_code"],
                'created_by' => $objUser->id
            ]);
        }
    }
}
