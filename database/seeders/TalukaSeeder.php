<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TalukaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('talukas')->insert([
            
            [
                'name' => 'Gondal',
            ],
            [
                'name' => 'Ankleshwar',
            ],
            [
                'name' => 'Dhari',
            ],
            [
                'name' => 'Chorasi',
            ],
        ]);
    }
}
