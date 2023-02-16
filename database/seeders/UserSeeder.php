<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'first_name' => 'ahmed',
            'last_name' => 'farag',
            'email' => 'admin@admin.com',
            'phone' => '01061756297',
            'email_verified_at' => now(),
            'password' => 'password',
            'salary'=> mt_rand(1000,99999),
        ])->each(function ($user) {
            $user->assignRole('admin');
        });
        User::factory(1)->create(['department_id'=>1])->each(function ($user) {
            $user->assignRole('manager');
        });
        User::factory(1)->create(['department_id'=>2])->each(function ($user) {
            $user->assignRole('manager');
        });
        User::factory(1)->create(['department_id'=>3])->each(function ($user) {
            $user->assignRole('manager');
        });
        User::factory(1)->create(['department_id'=>4])->each(function ($user) {
            $user->assignRole('manager');
        });
        User::factory(1)->create(['department_id'=>5])->each(function ($user) {
            $user->assignRole('manager');
        });
        User::factory(100)->create()->each(function ($user) {
            $user->assignRole('employee');
        });
        //update department manager id
        $departments = Department::all();
        for ($x=0;$x<count($departments);$x++){
            $departments[$x]->update(['manager_id'=>$x+2]);
        }
    }
}
