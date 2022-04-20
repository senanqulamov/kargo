<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Storage;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storages = [
            [
                'name' => 'Local'
            ],
            [
                'name' => 'ShipLounge'
            ],
        ];

        foreach ($storages as $storage) {
            Storage::create($storage);
        }
    }
}
