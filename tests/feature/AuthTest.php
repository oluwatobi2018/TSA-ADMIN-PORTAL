<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the login page is accessible.
     *
     * @return void
     */
    public function test_login_page_is_accessible()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /**
     * Test user can log in with correct credentials.
     *
     * @return void
     */
    public function test_user_can_log_in_with_correct_credentials()
    {
        // Create a test user
        $user = User::factory()->create([
            'password' => Hash::make('password123'), // Make sure the password is hashed
        ]);

        // Simulate logging in
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        // Check if the login was successful
        $response->assertRedirect(route('dashboard'));  // Assuming the redirect goes to the dashboard
        $this->assertAuthenticatedAs($user); // Ensure the user is authenticated
    }

    /**
     * Test user cannot log in with incorrect credentials.
     *
     * @return void
     */
    public function test_user_cannot_log_in_with_incorrect_credentials()
    {
        // Create a test user
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        // Attempt to log in with wrong password
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);

        // Ensure the response returns back to login
        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors(); // Ensure there are errors in the session

        $this->assertGuest(); // Ensure the user is still a guest (not logged in)
    }

    /**
     * Test user can log out successfully.
     *
     * @return void
     */
    public function test_user_can_log_out()
    {
        // Create a test user and log them in
        $user = User::factory()->create();
        $this->actingAs($user);

        // Perform the logout action
        $response = $this->post(route('logout'));

        // Assert the user is logged out
        $response->assertRedirect(route('home'));  // Assuming the user is redirected to the home page
        $this->assertGuest(); // Ensure the user is no longer authenticated
    }
}
