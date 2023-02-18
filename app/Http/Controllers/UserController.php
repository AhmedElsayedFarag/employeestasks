<?php

namespace App\Http\Controllers;

use App\Actions\GetUserEmployees;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view employees')->only('index');
        $this->middleware('permission:create employees')->only(['create', 'store']);
        $this->middleware('permission:update employees')->only(['edit', 'update']);
        $this->middleware('permission:delete employees')->only('destroy');
    }

    public function index()
    {
        return view('users.index', ['users' => app()->call(new GetUserEmployees())]);
    }


    public function create()
    {
        return view('users.create', ['departments' => Department::all(), 'roles' => Role::all()]);
    }


    public function store(CreateRequest $request)
    {
        User::create($request->validated())->assignRole($request->validated('role_id'));
        Session::flash('message', 'Saved Successfully');
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {

        return view('users.edit', ['user' => $user, 'departments' => Department::all()]);
    }


    public function update(UpdateRequest $request, User $user)
    {

        $user->update($request->validated());
        Session::flash('message', 'Updated Successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {

        User::findOrFail($id)->delete();
        return redirect()->back();
    }
}
