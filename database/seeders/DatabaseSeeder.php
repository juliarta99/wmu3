<?php

namespace Database\Seeders;

use App\Models\Contributor;
use App\Models\Team;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i = 0; $i < 15; $i++){
            $team = Team::create([
                "name" => "Kelompok ".$i,
                "year" => 2025
            ]);

            Contributor::create([
                'name' => 'Rai Bagus',
                'team_id' => $team->id
            ]);
        };
    }
}
