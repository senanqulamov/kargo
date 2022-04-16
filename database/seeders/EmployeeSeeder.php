<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
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
                'name' => 'administrator',   
                'email' => 'admin@cargo.com',             
                'password' => Hash::make('admin'),
            ],
        ];

        foreach ($users as $user) {
            Employee::create($user);
        }
    }
}
