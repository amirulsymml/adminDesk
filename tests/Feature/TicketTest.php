<?php

namespace Tests\Feature;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /** @test */
    public function a_guest_cannot_view_tickets()
    {
        $this->get(route('tickets.index'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function an_authenticated_user_can_view_tickets()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('tickets.index'))
            ->assertOk();
    }

    /** @test */
    public function an_admin_can_create_a_ticket()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $ticketData = Ticket::factory()->make()->toArray();

        $this->post(route('tickets.store'), $ticketData)
            ->assertRedirect(route('tickets.index'))
            ->assertSessionHas('success', 'Ticket created successfully.');

        $this->assertDatabaseHas('tickets', ['subject' => $ticketData['subject']]);
    }

    /** @test */
    public function a_customer_can_create_a_ticket()
    {
        $user = User::factory()->create(['role' => 'customer']);
        $this->actingAs($user);

        $ticketData = Ticket::factory()->make()->toArray();

        $this->post(route('tickets.store'), $ticketData)
            ->assertRedirect(route('tickets.index'))
            ->assertSessionHas('success', 'Ticket created successfully.');

        $this->assertDatabaseHas('tickets', ['subject' => $ticketData['subject']]);
    }

    /** @test */
    public function an_admin_can_update_a_ticket()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $ticket = Ticket::factory()->create();
        $updatedSubject = 'Updated Ticket Subject';

        $this->put(route('tickets.update', $ticket), array_merge($ticket->toArray(), ['subject' => $updatedSubject]))
            ->assertRedirect(route('tickets.index'))
            ->assertSessionHas('success', 'Ticket updated successfully.');

        $this->assertDatabaseHas('tickets', ['id' => $ticket->id, 'subject' => $updatedSubject]);
    }

    /** @test */
    public function an_admin_can_delete_a_ticket()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $ticket = Ticket::factory()->create();

        $this->delete(route('tickets.destroy', $ticket))
            ->assertRedirect(route('tickets.index'))
            ->assertSessionHas('success', 'Ticket deleted successfully.');

        $this->assertDatabaseMissing('tickets', ['id' => $ticket->id]);
    }

    /** @test */
    public function a_customer_cannot_delete_a_ticket()
    {
        $user = User::factory()->create(['role' => 'customer']);
        $this->actingAs($user);

        $ticket = Ticket::factory()->create();

        $this->delete(route('tickets.destroy', $ticket))
            ->assertForbidden();
    }


}