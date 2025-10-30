<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $priorities = ['Low', 'Medium', 'High', 'Urgent'];
        foreach ($priorities as $name) {
            Priority::create(['name' => $name]);
        }
    }
}
