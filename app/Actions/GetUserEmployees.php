<?php


namespace App\Actions;


use App\Models\User;

class GetUserEmployees extends Action
{
    public function __invoke()
    {
        return match (auth()->user()->getRoleNames()[0]) {
            'admin' => User::with(['department', 'department.manager', 'roles'])->role(['employee', 'manager'])->latest()->get(),
            'manager' => User::with(['department', 'department.manager', 'roles'])->role(['employee', 'manager'])->whereHas('department',function ($q){
                $q->where('manager_id',auth()->id());
            })->latest()->get(),
            default => [],
        };
    }
}
