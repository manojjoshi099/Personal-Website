<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutMes;
use Illuminate\Support\Facades\Storage;

class AboutMesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure only one AboutMe record exists
        AboutMes::firstOrCreate(
            [], // Check if any record exists
            [
                'title' => 'Hello, I\'m Manoj Kumar Joshi',
                'content' => '<p>I am a passionate web developer with expertise in Laravel, Vue.js, and modern frontend technologies. I love building intuitive and robust web applications. With a strong focus on clean code and user experience, I strive to create impactful solutions.</p><p>My journey in development began with a curiosity for how websites work, which quickly evolved into a full-fledged career. I\'m constantly learning and adapting to new technologies to stay at the forefront of the industry.</p>',
                'profile_picture' => 'images/default-profile.jpg', // Make sure this path exists in storage/app/public/images or adjust
                'cv_link' => 'documents/your_cv.pdf', // Make sure this path exists in storage/app/public/documents or adjust
            ]
        );
    }
}
