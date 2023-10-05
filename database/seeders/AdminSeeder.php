<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'role_id' => 1,
                'name' => 'admin',
                'password' => Hash::make('12345678'),

            ],
            [
                'role_id' => 2,
                'name' => 'pb_branch',
                'password' => Hash::make('12345678'),
            ],
            [
                'role_id' => 3,
                'name' => 'auditor_account',
                'password' => Hash::make('12345678'),
            ],
            [
                'role_id' => 4,
                'name' => 'tender',
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
