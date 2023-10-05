<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\PbBranch\PbBranchLoginSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
        ]);

        $this->call([
            RoleSeeder::class,
        ]);
        
        $this->call([
            DistrictSeeder::class,
        ]);
        $this->call([
            TalukaSeeder::class,
        ]);
        $this->call([
            WorkTypesSeeder::class,
        ]);
        $this->call([
            TypesOfWorkSeeder::class,
        ]);
        $this->call([
            BudgetSeeder::class,
        ]);
        $this->call([
            BudgetWorkSeeder::class,
        ]);
        $this->call([
            MpMlaSuggestedSeeder::class,
        ]);
        $this->call([
            SentBoxSeeder::class,
        ]);
        $this->call([
            PbBranchLoginSeeder::class,
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
