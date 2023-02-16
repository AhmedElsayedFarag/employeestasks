<?php


namespace App\Actions;


use App\Models\Task;

class GetUserTasks
{
    public function __invoke()
    {
        return match (auth()->user()->getRoleNames()[0]) {
            'admin' => Task::latest()->get(),
            'manager' => Task::where('manager_id', auth()->id())->latest()->get(),
            'employee' => Task::where('employee_id', auth()->id())->latest()->get(),
            default => [],
        };
    }

}
