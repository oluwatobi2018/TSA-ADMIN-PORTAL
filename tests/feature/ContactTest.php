<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a user can create a new contact.
     *
     * @return void
     */
    public function test_user_can_create_contact()
    {
        // Create a test user
        $user = User::factory()->create([
            'password' => Hash::make('password123'), // Ensure password is hashed
        ]);

        // Authenticate the user
        $this->actingAs($user);

        // Create a new contact
        $response = $this->post(route('contacts.store'), [
            'name' => 'John Doe',
            'phone' => '123-456-7890',
            'email' => 'john.doe@example.com',
        ]);

        // Assert the contact is created and the response is a redirect
        $response->assertRedirect(route('contacts.index'));

        // Assert the contact exists in the database
        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'phone' => '123-456-7890',
            'email' => 'john.doe@example.com',
        ]);
    }

    /**
     * Test if a user can update their contact.
     *
     * @return void
     */
    public function test_user_can_update_contact()
    {
        // Create a test user and a contact
        $user = User::factory()->create();
        $contact = Contact::factory()->create([
            'user_id' => $user->id,
            'name' => 'Jane Smith',
            'phone' => '098-765-4321',
            'email' => 'jane.smith@example.com',
        ]);

        // Authenticate the user
        $this->actingAs($user);

        // Update the contact
        $response = $this->put(route('contacts.update', $contact->id), [
            'name' => 'Jane Doe',
            'phone' => '555-555-5555',
            'email' => 'jane.doe@example.com',
        ]);

        // Assert the contact is updated and the response is a redirect
        $response->assertRedirect(route('contacts.index'));

        // Assert the contact data is updated in the database
        $this->assertDatabaseHas('contacts', [
            'name' => 'Jane Doe',
            'phone' => '555-555-5555',
            'email' => 'jane.doe@example.com',
        ]);
    }

    /**
     * Test if a user can delete their contact.
     *
     * @return void
     */
    public function test_user_can_delete_contact()
    {
        // Create a test user and a contact
        $user = User::factory()->create();
        $contact = Contact::factory()->create([
            'user_id' => $user->id,
            'name' => 'Mike Johnson',
            'phone' => '111-222-3333',
            'email' => 'mike.johnson@example.com',
        ]);

        // Authenticate the user
        $this->actingAs($user);

        // Delete the contact
        $response = $this->delete(route('contacts.destroy', $contact->id));

        // Assert the response is a redirect
        $response->assertRedirect(route('contacts.index'));

        // Assert the contact has been deleted from the database
        $this->assertDatabaseMissing('contacts', [
            'name' => 'Mike Johnson',
            'phone' => '111-222-3333',
            'email' => 'mike.johnson@example.com',
        ]);
    }

    /**
     * Test if a user cannot access another user's contacts.
     *
     * @return void
     */
    public function test_user_cannot_access_other_users_contacts()
    {
        // Create two users and two contacts
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $contact1 = Contact::factory()->create(['user_id' => $user1->id]);
        $contact2 = Contact::factory()->create(['user_id' => $user2->id]);

        // Authenticate as the first user
        $this->actingAs($user1);

        // Try to access the second user's contact
        $response = $this->get(route('contacts.show', $contact2->id));

        // Assert that the user is not allowed to access the contact
        $response->assertStatus(403);
    }
}
