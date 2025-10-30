<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = ['Incident', 'Service Request', 'Task', 'Change'];
        foreach ($types as $name) {
            Type::create(['name' => $name]);
        }
    }
}
