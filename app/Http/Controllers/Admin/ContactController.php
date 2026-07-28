<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(20);

        return view('admin.contact.messages', compact('messages'));
    }

    public function showMessage(ContactMessage $message)
    {
        $message->update(['is_read' => true]);

        return view('admin.contact.show', compact('message'));
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);

        return back()->with('success', 'Message marked as read.');
    }

    public function deleteMessage(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.contact.messages')->with('success', 'Message deleted successfully!');
    }

    public function editInfo()
    {
        $contactInfo = ContactInformation::firstOrCreate([]);

        return view('admin.contact.info', compact('contactInfo'));
    }

    public function updateInfo(Request $request)
    {
        $validated = $request->validate([
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
        ]);

        $contactInfo = ContactInformation::firstOrCreate([]);
        $contactInfo->update($validated);

        return redirect()->route('admin.contact.info')->with('success', 'Contact information updated successfully!');
    }
}
