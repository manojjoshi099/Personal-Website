<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage; // Assuming you have a ContactMessage model for storing messages
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // For sending emails
use App\Mail\ContactFormMail; // You'll create this Mailable class

class ContactController extends Controller
{
    /**
     * Display the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contact.index'); // Points to resources/views/contact/index.blade.php
    }

    /**
     * Store a new contact message and send an email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        // 1. Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            // Add Google reCAPTCHA validation if you implement it
            // 'g-recaptcha-response' => 'required|recaptcha',
        ]);

        try {
            // 2. Store the message in the database
            ContactMessage::create($validated);

            // 3. Send an email notification (optional, but highly recommended)
            // Ensure you configure your .env for mail settings (MAIL_MAILER, MAIL_HOST, etc.)
            Mail::to(config('mail.from.address')) // Sends to the email defined in config/mail.php 'from' address
                ->send(new ContactFormMail($validated));

            // 4. Redirect back with a success message
            return redirect()->route('contact.index')->with('success', 'Your message has been sent successfully!');

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Contact form submission failed: ' . $e->getMessage(), ['exception' => $e]);

            // Redirect back with an error message
            return redirect()->back()->withInput()->with('error', 'There was an error sending your message. Please try again later.');
        }
    }
}
