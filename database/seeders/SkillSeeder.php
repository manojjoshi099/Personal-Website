<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing skills to prevent duplicates on re-seed
        Skill::truncate();

        $skills = [
            // Frontend Skills
            ['name' => 'HTML5', 'category' => 'Frontend', 'proficiency' => 'Expert', 'icon_class' => 'fab fa-html5', 'order' => 10],
            ['name' => 'CSS3', 'category' => 'Frontend', 'proficiency' => 'Expert', 'icon_class' => 'fab fa-css3-alt', 'order' => 20],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'proficiency' => 'Advanced', 'icon_class' => 'fab fa-js', 'order' => 30],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'proficiency' => 'Advanced', 'icon_class' => 'fab fa-vuejs', 'order' => 40],
            ['name' => 'React.js', 'category' => 'Frontend', 'proficiency' => 'Intermediate', 'icon_class' => 'fab fa-react', 'order' => 50],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'proficiency' => 'Expert', 'icon_class' => ''], // No specific FontAwesome for Tailwind
            ['name' => 'Bootstrap', 'category' => 'Frontend', 'proficiency' => 'Advanced', 'icon_class' => 'fab fa-bootstrap', 'order' => 60],
            ['name' => 'Alpine.js', 'category' => 'Frontend', 'proficiency' => 'Advanced', 'icon_class' => ''],

            // Backend Skills
            ['name' => 'PHP', 'category' => 'Backend', 'proficiency' => 'Expert', 'icon_class' => 'fab fa-php', 'order' => 100],
            ['name' => 'Laravel', 'category' => 'Backend', 'proficiency' => 'Expert', 'icon_class' => 'fab fa-laravel', 'order' => 110],
            ['name' => 'MySQL', 'category' => 'Backend', 'proficiency' => 'Advanced', 'icon_class' => 'fas fa-database', 'order' => 120],
            ['name' => 'PostgreSQL', 'category' => 'Backend', 'proficiency' => 'Intermediate', 'icon_class' => 'fas fa-database', 'order' => 130],
            ['name' => 'RESTful APIs', 'category' => 'Backend', 'proficiency' => 'Advanced', 'icon_class' => 'fas fa-server', 'order' => 140],
            ['name' => 'Composer', 'category' => 'Backend', 'proficiency' => 'Expert', 'icon_class' => 'fab fa-php', 'order' => 150],


            // Tools & DevOps
            ['name' => 'Git', 'category' => 'Tools & DevOps', 'proficiency' => 'Expert', 'icon_class' => 'fab fa-git-alt', 'order' => 200],
            ['name' => 'GitHub', 'category' => 'Tools & DevOps', 'proficiency' => 'Expert', 'icon_class' => 'fab fa-github', 'order' => 210],
            ['name' => 'Docker', 'category' => 'Tools & DevOps', 'proficiency' => 'Intermediate', 'icon_class' => 'fab fa-docker', 'order' => 220],
            ['name' => 'VS Code', 'category' => 'Tools & DevOps', 'proficiency' => 'Expert', 'icon_class' => ''], // No specific FontAwesome for VS Code
            ['name' => 'NPM', 'category' => 'Tools & DevOps', 'proficiency' => 'Advanced', 'icon_class' => 'fab fa-npm', 'order' => 230],
            ['name' => 'Vite', 'category' => 'Tools & DevOps', 'proficiency' => 'Advanced', 'icon_class' => ''],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
