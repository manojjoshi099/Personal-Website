<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactMessage;
use Carbon\Carbon;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactMessage::truncate();

        ContactMessage::create([
            'name' => 'Manoj Kumar Joshi',
            'email' => 'work@manojjoshi.com.np',
            'subject' => 'Inquiry about Web Development',
            'message' => 'Hello, I\'m interested in your web development services. Could you please provide more information on your process?',
            'read_at' => null,
        ]);

        ContactMessage::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'subject' => 'Feedback on Portfolio',
            'message' => 'Hi, I just wanted to say that your portfolio looks great! Very professional.',
            'read_at' => Carbon::now(), // Marked as read
        ]);
    }
}
