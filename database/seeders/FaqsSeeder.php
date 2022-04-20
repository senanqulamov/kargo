<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Faqs::factory(10)->create();
    }
}
