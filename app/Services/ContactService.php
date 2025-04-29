<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactService
{
    /**
     * Get all contacts for the authenticated user.
     */
    public function listUserContacts()
    {
        return Contact::where('user_id', Auth::id())
                      ->orderBy('created_at', 'desc')
                      ->get();
    }

    /**
     * Search user's contacts by term.
     */
    public function searchUserContacts(string $term)
    {
        return Contact::where('user_id', Auth::id())
            ->where(function ($query) use ($term) {
                $query->where('name', 'like', "%{$term}%")
                      ->orWhere('phone', 'like', "%{$term}%")
                      ->orWhere('email', 'like', "%{$term}%");
            })
            ->orderBy('name')
            ->get();
    }

    /**
     * Create a new contact for the authenticated user.
     */
    public function createContact(array $data)
    {
        return Contact::create(array_merge($data, [
            'user_id' => Auth::id(),
        ]));
    }

    /**
     * Update a contact (if it belongs to the authenticated user).
     */
    public function updateContact(Contact $contact, array $data): ?Contact
    {
        if ($contact->user_id !== Auth::id()) {
            return null;
        }

        $contact->update($data);
        return $contact;
    }
}
