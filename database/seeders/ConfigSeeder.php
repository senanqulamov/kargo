<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            [
                'key'=>'favicon',
                'type'=>'favicon',
                'value'=>'Shiplounge.ico',
            ],
            [
                'key'=>'logo',
                'type'=>'logo',
                'value'=>'logo.svg',
            ],
            [
                'key'=>'footer_logo',
                'type'=>'footer_logo',
                'value'=>'footerLogo.svg',
            ],
        ]);
    }
}
