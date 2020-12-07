<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "Fanny",
                'email' => "fanny@aled.com",
                'role_id' => 1,
                'password' => Hash::make('fanny@aled.com'),
            ],
            [
                'name' => "Ayhan",
                'email' => "Ayhan@molengeek.com",
                'role_id' => 2,
                'password' => Hash::make('Ayhan@molengeek.com'),
                ],
            [
                'name' => "Elias",
                'email' => "Elias@molengeek.com",
                'role_id' => 3,
                'password' => Hash::make('Elias@molengeek.com'),
            ],
            [
                'name' => "Nicolas",
                'email' => "nicolas@molengeek.com",
                'role_id' => 4,
                'password' => Hash::make('nicolas@molengeek.com'),
            ],
        ]);
    }
}
