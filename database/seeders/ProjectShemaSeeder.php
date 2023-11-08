<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectShemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('name_of_schemas')->insert([
            [
                'budget_id' => 1,
                'name' => '17- રાજયમાં નવા પુલોનું બાંધકામ',
            ],
            [
                'budget_id' => 2,
                'name' => '28-રોડ સેફટી ઓડીટ',
            ],
            [
                'budget_id' => 2,
                'name' => '13 - હયાત ઉદ્યોગો',
            ],
            [
                'budget_id' => 2,
                'name' => '78 - ૬ ટુરીસ્ટ સરકીટના રસ્તાઓ',
            ],
            [
                'budget_id' => 2,
                'name' => '15 - નબળા / સાંકડા પુલો',
            ],
            [
                'budget_id' => 2,
                'name' => '72 - પંચાયતમાંથી તબદીલ થયેલ મુ.જી.મા.ને પહોળા/મજબુત કરવા',
            ],
            [
                'budget_id' => 2,
                'name' => '69-વિકાસપથ વિસ્તરણ',
            ],
            [
                'budget_id' => 2,
                'name' => '20 - નબળા પુલો સંગીન બનાવવા',
            ],
            [
                'budget_id' => 2,
                'name' => '7-મહાનગરોને જોડતા રસ્તા',
            ],
            [
                'budget_id' => 3,
                'name' => '1- પ્રવાસીપથ',
            ],
            [
                'budget_id' => 4,
                'name' => 'ખાસ મરામત',
            ],
            [
                'budget_id' => 5,
                'name' => 'ડીપોઝીટ વર્ક',
            ],
            [
                'budget_id' => 6,
                'name' => '૫૦ : ૫૦ ટકા સહભાગીદારી - આર. ઓ. બી',
            ],
        ]);
    }
}
