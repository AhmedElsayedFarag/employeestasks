<?php


namespace App\Actions;


use App\Models\Task;

class GetUserTasks extends Action
{
    public function __invoke()
    {
        return match (auth()->user()->getRoleNames()[0]) {
            'admin' => Task::query(),
            'manager' => Task::query()->where('manager_id', auth()->id()),
            'employee' => Task::query()->where('employee_id', auth()->id()),
            default => abort(403),
        };
    }

}
