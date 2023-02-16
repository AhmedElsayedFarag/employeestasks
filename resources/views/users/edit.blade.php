@extends('layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{$user->name}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Errors</h4>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form form-horizontal" action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-body">
                                    <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>First name</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="first_name"
                                                               value="{{$user->first_name}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Last name</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="last_name"
                                                               value="{{$user->last_name}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Salary</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="number" class="form-control" name="salary"
                                                               value="{{$user->salary}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Email</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input  type="email" class="form-control" name="email" value="{{$user->email}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Phone</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Password</span>
                                                    </div>
                                                    <div class="col-md-8 controls"><strong class="text-danger">If You don't want to change it leave it blank</strong>
                                                        <input type="password" id="password" class="form-control" name="password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Department</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2" name="department_id">
                                                            <option value="" selected disabled>Select department</option>
                                                            @foreach($departments as $department)
                                                                <option {{($department->id == $user->department_id)?'selected':''}} value="{{$department->id}}">{{$department->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Image</span>
                                                    </div>
                                                    <div class="col-md-4"><strong class="text-danger">If You don't want to change it leave it blank</strong>
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img src="{{asset($user->image)}}" class="img-fluid img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')

@endsection
