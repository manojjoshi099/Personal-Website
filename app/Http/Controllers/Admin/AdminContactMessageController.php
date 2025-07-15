<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminContactMessageController extends Controller
{
    /**
     * Display a listing of the contact messages.
     */
    public function index()
    {
        // Order by created_at descending, unread first
        $messages = ContactMessage::orderByRaw('read_at IS NOT NULL') // False values (null) first
                                ->orderByDesc('created_at')
                                ->paginate(10);
        return view('admin.contact-messages.index', compact('messages'));
    }

    /**
     * Mark the specified contact message as read.
     */
    public function markAsRead(ContactMessage $contactMessage)
    {
        if ($contactMessage->read_at === null) {
            $contactMessage->update(['read_at' => now()]);
        }
        return redirect()->route('admin.contact-messages.index')->with('status', 'Message marked as read!');
    }

    /**
     * Remove the specified contact message from storage.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('admin.contact-messages.index')->with('status', 'Message deleted successfully!');
    }
}
