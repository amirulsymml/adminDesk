<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $departments = ['IT', 'Finance', 'HR', 'Support'];
        foreach ($departments as $name) {
            Department::create(['name' => $name]);
        }
    }
}
