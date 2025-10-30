<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Type;
use App\Models\Department;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customer = User::inRandomOrder()->first();
        $assignedUser = User::inRandomOrder()->first();
        $priority = Priority::inRandomOrder()->first();
        $status = Status::inRandomOrder()->first();
        $type = Type::inRandomOrder()->first();
        $department = Department::inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();

        return [
            'subject' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'customer_id' => $customer ? $customer->id : null,
            'assigned_user_id' => $assignedUser ? $assignedUser->id : null,
            'priority_id' => $priority ? $priority->id : null,
            'status_id' => $status ? $status->id : null,
            'type_id' => $type ? $type->id : null,
            'department_id' => $department ? $department->id : null,
            'category_id' => $category ? $category->id : null,
        ];
    }
}
