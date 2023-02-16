<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\CreateRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{

    public function index()
    {
        if (!auth()->user()->can('view departments')) {
            abort(403);
        }
        $departments = Department::with(['manager'])->withCount(['employees','employees as salaries'=>function($q){
            $q->select(DB::raw('sum(salary)'));
        }])->get();
        return view('departments.index', ['departments' => $departments]);
    }


    public function create()
    {
        if (!auth()->user()->can('create departments')) {
            abort(403);
        }
        return view('departments.create',['managers'=>User::role('manager')->get()]);

    }


    public function store(CreateRequest $request)
    {
        if (!auth()->user()->can('create departments')) {
            abort(403);
        }
        Department::create($request->validated());
        Session::flash('message', 'Saved Successfully');
        return redirect()->route('departments.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(Department $department)
    {
        if (!auth()->user()->can('update departments')) {
            abort(403);
        }
        return view('departments.edit', ['department' => $department,'managers'=>User::role('manager')->get()]);

    }


    public function update(CreateRequest $request, Department $department)
    {
        if (!auth()->user()->can('update departments')) {
            abort(403);
        }
        $department->update($request->validated());
        Session::flash('message', 'Updated Successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {
        if (!auth()->user()->can('delete departments')) {
            abort(403);
        }
        $department = Department::findOrFail($id);
        if (count($department->employees)) {
            Session::flash('error', 'can\'t delete department which has employees');
        } else {
            $department->delete();
        }
        return redirect()->back();
    }
}
