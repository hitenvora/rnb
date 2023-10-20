<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types_of_works')->insert([

            [
                'name' => 'Road',
            ],
            [
                'name' => 'Re-Surfacing',
            ],
            [
                'name' => 'Strengthening',
            ],
            [
                'name' => '3.75 to 5.5',
            ],
            [
                'name' => '3.75 to 7',
            ],
            [
                'name' => '3.75 to 10',
            ],
            [

                'name' => '5.5 to 7',
            ],
            [

                'name' => '5.5 to 10',
            ],
            [

                'name' => '7 to 10',
            ],
            [

                'name' => '7 to 4 lan',
            ],
            [

                'name' => '10 to 4 lan',
            ],
            [

                'name' => '10 to 6 lan',
            ],
            [

                'name' => '4 lan to 6 lan',
            ],
            [
                'name' => 'Others',
            ],
        ]);
    }
}
