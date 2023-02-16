<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'manager']);
        Role::create(['name'=>'employee']);

        Permission::create(['name'=>'view departments'])->syncRoles(['admin']);
        Permission::create(['name'=>'view employees'])->syncRoles(['admin', 'manager']);
        Permission::create(['name'=>'view tasks'])->syncRoles(['admin', 'manager','employee']);

        Permission::create(['name'=>'create departments'])->syncRoles(['admin']);
        Permission::create(['name'=>'create employees'])->syncRoles(['admin', 'manager']);
        Permission::create(['name'=>'create tasks'])->syncRoles(['admin', 'manager']);

        Permission::create(['name'=>'update departments'])->syncRoles(['admin']);
        Permission::create(['name'=>'update employees'])->syncRoles(['admin', 'manager']);
        Permission::create(['name'=>'update tasks'])->syncRoles(['admin', 'manager','employee']);

        Permission::create(['name'=>'delete departments'])->syncRoles(['admin']);
        Permission::create(['name'=>'delete employees'])->syncRoles(['admin', 'manager']);
        Permission::create(['name'=>'delete tasks'])->syncRoles(['admin', 'manager']);


    }
}
