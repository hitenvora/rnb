<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesOfWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('work_types')->insert([
            
            [
                'name' => 'Road',
            ],
            [
                'name' => 'Building',
            ],
            [
                'name' => 'Bridge',
            ],
            [
                'name' => 'Structures',
            ],
            [
                'name' => 'Others',
            ],
        ]);
    }
}
