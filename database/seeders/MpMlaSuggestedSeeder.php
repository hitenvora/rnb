<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MpMlaSuggestedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mp_mla_suggesteds')->insert([

            [
                'name' => 'MP/MLA',
            ],
            [
                'name' => 'MLA',
            ],
        ]);
    }
}
