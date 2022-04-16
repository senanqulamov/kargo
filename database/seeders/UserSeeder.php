<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
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
        $users = [
            [
                'name' => 'Rashad Alakbarov',   
                'email' => 'rashadalakbarov@gmail.com',             
                'password' => Hash::make('qasimov24123'),
                'phone' => '994558215673',
                'sex' => 1,
                'city' => 'azerbaijan',
                'store' => 'own',
                'referer' => 'google'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
