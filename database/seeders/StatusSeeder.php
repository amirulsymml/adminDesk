<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = ['Open', 'In Progress', 'Pending', 'Resolved', 'Closed'];
        foreach ($statuses as $name) {
            Status::create([
                'name' => $name,
                'slug' => str($name)->slug(),
            ]);
        }
    }
}
