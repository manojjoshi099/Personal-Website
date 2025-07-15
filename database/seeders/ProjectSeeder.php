<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate(); // Clear existing projects

        $projects = [
            [
                'title' => 'E-commerce Platform',
                'short_description' => 'A full-featured e-commerce platform with product listings, cart, checkout, and admin panel.',
                'long_description' => '<p>This project involved building a comprehensive online store from scratch. Key features include user authentication, product management (CRUD for admin), categories, search functionality, a shopping cart, and a secure checkout process. It integrates with a dummy payment gateway for demonstration purposes.</p><p>I focused on creating a clean user interface and a robust backend to handle inventory and orders efficiently.</p>',
                'technologies' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL', 'Stripe API (dummy)'],
                'live_url' => 'https://demo-ecommerce.example.com',
                'github_url' => 'https://github.com/yourusername/ecommerce-platform',
                'featured_image' => 'images/project-ecommerce.jpg', // Placeholder image
                'screenshots' => [
                    'images/ecommerce-ss1.jpg',
                    'images/ecommerce-ss2.jpg',
                    'images/ecommerce-ss3.jpg',
                ],
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Task Management App',
                'short_description' => 'A simple yet powerful task management application for individuals and small teams.',
                'long_description' => '<p>Designed for productivity, this app allows users to create, assign, and track tasks. It includes features like due dates, priority levels, and user roles. The frontend offers a smooth, reactive experience for updating task statuses without page reloads.</p><p>Leveraged Livewire\'s capabilities for real-time updates and interactive components.</p>',
                'technologies' => ['Laravel', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'MySQL'],
                'live_url' => 'https://demo-tasks.example.com',
                'github_url' => 'https://github.com/yourusername/task-manager',
                'featured_image' => 'images/project-tasks.jpg',
                'screenshots' => [
                    'images/tasks-ss1.jpg',
                    'images/tasks-ss2.jpg',
                ],
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Personal Blog',
                'short_description' => 'A simple, elegant blog platform built for ease of content creation and consumption.',
                'long_description' => '<p>This blog application focuses on clean design and efficient content delivery. It features a markdown editor for post creation, tag and category support, and a responsive layout. User authentication allows authors to manage their posts securely.</p><p>A great example of a content-focused application built with Laravel and Blade.</p>',
                'technologies' => ['Laravel', 'Blade', 'MySQL'],
                'live_url' => 'https://demo-blog.example.com',
                'github_url' => 'https://github.com/yourusername/personal-blog',
                'featured_image' => 'images/project-blog.jpg',
                'screenshots' => [
                    'images/blog-ss1.jpg',
                    'images/blog-ss2.jpg',
                ],
                'is_featured' => false,
                'order' => 3,
            ],
            // Add more projects as needed
        ];

        foreach ($projects as $projectData) {
            $projectData['slug'] = Str::slug($projectData['title']); // Generate slug
            Project::create($projectData);
        }
    }
}
