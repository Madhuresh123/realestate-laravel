<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;


class AllTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    

        DB::table('all_type')->insert([

            [
                'typename' => 'Warehouse',
                'typeicon' => 'Icon-2',
            ],

            [
                'typename' => 'Office',
                'typeicon' => 'Icon-7',
            ],

            [
                'typename' => 'House',
                'typeicon' => 'Icon-8',
            ],

            [
                'typename' => 'Flat-3',
                'typeicon' => 'Icon-2',
            ],

            [
                'typename' => 'Apartment',
                'typeicon' => 'Icon-8',
            ],

            [
                'typename' => 'Farmhouse',
                'typeicon' => 'Icon-6',
            ],
        ]);
    }
}
