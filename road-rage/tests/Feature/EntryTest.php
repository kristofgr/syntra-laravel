<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entry;
use App\Models\User;

class EntryTest extends TestCase
{
    use RefreshDatabase;

    public function testEntryCanBePosted()
    {
        // Simulate authentication
        $user = User::factory()->create();
        $this->actingAs($user);

        // Define the entry data
        $entryData = [
            'message' => 'Test Entry',
            'plate' => 'ABC123',
        ];

        // Send a POST request to the entries store route
        $response = $this->post(route('entries.store'), $entryData);

        // Assert that the entry is created in the database
        $this->assertDatabaseHas('entries', $entryData);

        // Assert that the response has a successful status
        $response->assertStatus(302);
    }

    public function testEntryCannotBePostedWithoutAuthentication()
    {
        // Define the entry data
        $entryData = [
            'message' => 'Test Entry',
            'plate' => 'ABC123',
        ];

        // Send a POST request to the entries store route without authentication
        $response = $this->post(route('entries.store'), $entryData);

        // Assert that the entry was not created
        $this->assertDatabaseMissing('entries', $entryData);

        // Assert that the response is a redirect
        $response->assertRedirect(route('login'));
    }
}
