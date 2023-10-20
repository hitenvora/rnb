<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgetWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('budget_works')->insert([

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
                'name' => 'Widening (3.75 to 5.5)',
            ],
            [
                'name' => 'Widening (3.75 to 7)',
            ],
        ]);
    }
}
