<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\PbBranch\PbBranchLoginSeeder;
use Database\Seeders\rnb\database\seeders\RoadNameSeeder;
use Database\Seeders\RoadNameSeeder as SeedersRoadNameSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {$this->call([
        RoleSeeder::class,
    ]);
        $this->call([
            AdminSeeder::class,
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
            ProjectShemaSeeder::class,
        ]);
        
        $this->call([
            CrRoadNameSeeder::class,
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
