<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EmployeeSeeder::class,
            UserSeeder::class,
            RolePermissionSeeder::class,
            MessageSeeder::class,
            BranchSeeder::class,
            CargoSeeder::class,
            FaqsSeeder::class,
            WarehousesSeeder::class,
        ]);
    }
}
