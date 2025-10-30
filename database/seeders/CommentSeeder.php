<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = Ticket::all();
        $users = User::all();

        if ($tickets->isEmpty() || $users->isEmpty()) {
            // Handle case where no tickets or users exist
            return;
        }

        Comment::factory()->count(100)->create([
            'ticket_id' => $tickets->random()->id,
            'user_id' => $users->random()->id,
        ]);
    }
}
