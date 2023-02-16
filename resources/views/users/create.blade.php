@extends('layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create new user</h4>
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
                            <form class="form form-horizontal" action="{{route('users.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>First name</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="first_name"
                                                           value="{{old('first_name')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Last name</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="last_name"
                                                           value="{{old('last_name')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Salary</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="number" class="form-control" name="salary"
                                                           value="{{old('salary')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Image</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Email</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="email" class="form-control" name="email"
                                                           value="{{old('email')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Phone</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="phone"
                                                           value="{{old('phone')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Password</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="password" id="password" class="form-control"
                                                           name="password">
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
                                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Role</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select required class="form-control select2" name="role_id">
                                                        <option value="" selected disabled>Select role</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
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
    <script>
        function showPassword() {
            if ($('#password').attr('type') == 'text') {
                $('#password').attr('type', 'password');
            } else {
                $('#password').attr('type', 'text');
            }

            if ($('#eye_icon').attr('class') == 'feather icon-eye') {
                $('#eye_icon').attr('class', 'feather icon-eye-off');
            } else {
                $('#eye_icon').attr('class', 'feather icon-eye');
            }


        }
    </script>
@endsection
