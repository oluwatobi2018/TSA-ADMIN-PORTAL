<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    /**
     * GET /api/contacts
     * List all contacts belonging to the authenticated user.
     */
    public function index(Request $request)
    {
        $contacts = Contact::where('user_id', $request->user()->id)
                           ->orderBy('created_at', 'desc')
                           ->get();

        return response()->json([
            'data' => $contacts,
        ]);
    }

    /**
     * GET /api/contacts/search?term=…
     * Search contacts by name, phone, or email.
     */
    public function search(Request $request)
    {
        $term = $request->query('term', '');

        $contacts = Contact::where('user_id', $request->user()->id)
            ->where(function($q) use ($term) {
                $q->where('name',  'like', "%{$term}%")
                  ->orWhere('phone', 'like', "%{$term}%")
                  ->orWhere('email', 'like', "%{$term}%");
            })
            ->orderBy('name')
            ->get();

        return response()->json([
            'data' => $contacts,
        ]);
    }

    /**
     * POST /api/contacts
     * Create a new contact for the authenticated user.
     */
    public function store(CreateContactRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        $contact = Contact::create($data);

        return response()->json([
            'message' => 'Contact created successfully.',
            'data'    => $contact,
        ], 201);
    }

    /**
     * PUT /api/contacts/{contact}
     * Update an existing contact. Ensures ownership.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        // Ensure the contact belongs to the authenticated user
        if ($contact->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Forbidden: you may only edit your own contacts.'
            ], 403);
        }

        $contact->update($request->validated());

        return response()->json([
            'message' => 'Contact updated successfully.',
            'data'    => $contact,
        ]);
    }
}
