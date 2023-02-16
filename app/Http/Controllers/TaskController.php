<?php

namespace App\Http\Controllers;

use App\Actions\GetUserTasks;
use App\Http\Requests\Task\CreateRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{

    public function index()
    {
        if (!auth()->user()->can('view tasks')) {
            abort(403);
        }
        return view('tasks.index', ['tasks' => app()->call(new GetUserTasks())]);
    }


    public function create()
    {
        if (!auth()->user()->can('create tasks')) {
            abort(403);
        }
        return view('tasks.create', ['employees' => auth()->user()->department->employees ?? []]);
    }


    public function store(CreateRequest $request)
    {
        if (!auth()->user()->can('create tasks')) {
            abort(403);
        }
        Task::create($request->validated());
        Session::flash('message', 'Saved Successfully');
        return redirect()->route('tasks.index');
    }


    public function edit(Task $task)
    {
        if (!auth()->user()->can('update tasks')) {
            abort(403);
        }
        return view('tasks.edit', ['task' => $task, 'employees' => auth()->user()->department->employees ?? []]);
    }


    public function update(CreateRequest $request, Task $task)
    {
        if (!auth()->user()->can('update tasks')) {
            abort(403);
        }
        $task->update($request->validated());
        Session::flash('message', 'Updated Successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {
        if (!auth()->user()->can('delete tasks')) {
            abort(403);
        }
        Task::findOrFail($id)->delete();
        return redirect()->back();
    }
}
