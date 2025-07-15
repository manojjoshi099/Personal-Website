<x-mail::message>
# New Contact Message

You have received a new message from your portfolio contact form.

**From:** {{ $name }}
**Email:** {{ $email }}
**Subject:** {{ $subject_line }}

**Message:**
{{ $message_body }}

<x-mail::button :url="route('admin.contact-messages.index')">
View in Admin Panel
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
