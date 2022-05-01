<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'title' => 'ShipLounge',
            'phone' => '994515367952',
            'email' => 'info@shiplounge.com',
            'address' => 'Turkish address',
            'description' => 'New Website for Shiplounge',
            'status' => 1,
        ]);
    }
}
