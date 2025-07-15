<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Call your custom seeders here
        $this->call([
            AboutMesSeeder::class,
            SkillSeeder::class,
            ProjectSeeder::class,
            ContactMessageSeeder::class,
            UserSeeder::class, // Ensure this is included to seed the user
            // Add other seeders if you create them later
        ]);

        // You might also use factories here, e.g.:
        // \App\Models\User::factory(10)->create(); // Create 10 dummy users
    }
}
