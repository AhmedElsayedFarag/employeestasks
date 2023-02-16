<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(['name'=>'accounting']);
        Department::create(['name'=>'development']);
        Department::create(['name'=>'front end']);
        Department::create(['name'=>'UI']);
        Department::create(['name'=>'HR']);
    }
}
