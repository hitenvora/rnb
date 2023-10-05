<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            [
                'id' => 1,
                'name' => 'Administrator',
            ],
            [
                'id' => 2,
                'name' => 'PB Branch',
            ],
            [
                'id' => 3,
                'name' => 'Auditor/Account',
            ],
            [
                'id' => 4,
                'name' => 'Tender Branch',
            ],
        ]);
    
    }
}
