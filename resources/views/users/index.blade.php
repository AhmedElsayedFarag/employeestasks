@extends('layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                        @can('create employees')
                            <a href="{{route('users.create')}}" class="btn btn-primary pull-right"><i
                                    class="feather icon-plus-square"></i> Add</a>
                        @endcan
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Salary</th>
                                        <th>Role</th>
                                        <th>Image</th>
                                        <th>Manager</th>
                                        <th>Full name</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->first_name}}</td>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{$user->salary}}</td>
                                            <td>{{$user->getRoleNames()[0]}}</td>
                                            <td><img src="{{asset($user->image)}}" style="width: 50px"
                                                     class="img-thumbnail img-fluid"></td>
                                            <td>{{$user->manager->name??''}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>
                                                @can('update employees')
                                                    <a href="{{route('users.edit',$user->id)}}"
                                                       class="btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                                                @endcan
                                                @can('delete employees')
                                                    <a onclick="fireDeleteEvent({{$user->id}})" type="button"
                                                       class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                                                    <form action="{{route('users.destroy',$user->id)}}" method="POST"
                                                          id="form-{{$user->id}}">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
