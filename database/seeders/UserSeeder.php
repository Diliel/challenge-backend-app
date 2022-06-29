<?php

namespace Database\Seeders;

use App\Models\Core\Auth\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objUser = [
            [
                'name' => 'Usuario 1',
                'email' => 'user1@user.com',
                'password' => bcrypt('admin'),
                'email_verified_at' => now()
            ],
            [
                'name' => 'Usuario 2',
                'email' => 'user2@user.com',
                'password' => bcrypt('admin'),
                'email_verified_at' => now()
            ],
            [
                'name' => 'Usuario 3',
                'email' => 'user3@user.com',
                'password' => bcrypt('admin'),
                'email_verified_at' => now()
            ],
        ];

        foreach ($objUser as $data) {
            User::create([
                'name' => $data["name"],
                'email' =>  $data["email"],
                'password' => $data["password"],
                'email_verified_at' =>  $data["email_verified_at"],
            ]);
        }
    }
}
