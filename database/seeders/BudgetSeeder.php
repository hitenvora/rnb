<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('budgets')->insert([
            [
                'id'   => 1,
                'name' => '101 Bridge',
            ],
            [
                'id'   => 2,
                'name' => '5054 Lump',
            ],
            [
                'id'   => 3,
                'name' => 'Pravasipath',
            ],
            [
                'id'   => 4,
                'name' => '3054 SR',
            ],
            [
                'id'   => 5,
                'name' => 'Deposited Work',
            ],
            [
                'id'   => 6,
                'name' => '50:50 Cost Sharing ROB - 5054 Lump',
            ],
            [
                'id'   => 7,
                'name' => '4216',
            ],
            [
                'id'   => 8,
                'name' => '4059',
            ],
            [
                'id'   => 9,
                'name' => '4250',
            ],
            [
                'id'   => 10,
                'name' => '4225',
            ],
            [
                'id'   => 11,
                'name' => '2216',
            ],
            [
                'id'   => 12,
                'name' => '2059',
            ],
            [
                'id'   => 13,
                'name' => '3054',
            ],
            [
                'id'   => 14,
                'name' => '2070',
            ],
            [
                'id'   => 15,
                'name' => '2075',
            ],


        ]);
    }
}
