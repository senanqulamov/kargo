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
        $admins = [
            [
                'name' => 'administrator',   
                'email' => 'admin@cargo.com',             
                'password' => Hash::make('admin'),
            ],
        ];

        foreach ($admins as $admin) {
            Employee::create($admin);
        }
    }
}
