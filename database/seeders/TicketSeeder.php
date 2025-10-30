<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Type;
use App\Models\Department;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $priorities = Priority::all();
        $statuses = Status::all();
        $types = Type::all();
        $departments = Department::all();
        $categories = Category::all();

        if ($users->isEmpty() || $priorities->isEmpty() || $statuses->isEmpty() || $types->isEmpty() || $departments->isEmpty() || $categories->isEmpty()) {
            // Handle case where no related data exists
            return;
        }

        Ticket::factory()->count(50)->create([
            'customer_id' => $users->random()->id,
            'assigned_user_id' => $users->random()->id,
            'priority_id' => $priorities->random()->id,
            'status_id' => $statuses->random()->id,
            'type_id' => $types->random()->id,
            'department_id' => $departments->random()->id,
            'category_id' => $categories->random()->id,
        ]);
    }
}
