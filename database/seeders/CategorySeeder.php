<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::all();

        if ($departments->isEmpty()) {
            // Handle case where no departments exist, perhaps log or create default ones
            return;
        }

        $categories = [
            ['name' => 'Software Issue', 'department_id' => $departments->random()->id],
            ['name' => 'Hardware Issue', 'department_id' => $departments->random()->id],
            ['name' => 'Network Issue', 'department_id' => $departments->random()->id],
            ['name' => 'Account Issue', 'department_id' => $departments->random()->id],
            ['name' => 'General Inquiry', 'department_id' => $departments->random()->id],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
