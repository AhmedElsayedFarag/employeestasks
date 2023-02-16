@extends('layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create new task</h4>
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
                            <form class="form form-horizontal" action="{{route('tasks.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Text</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="text"
                                                           value="{{old('text')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Status</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="status"
                                                           value="{{old('status')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Employee</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select class="form-control select2" name="employee_id">
                                                        <option value="" selected disabled>Select employee</option>
                                                        @foreach($employees as $employee)
                                                            <option value="{{$employee->id}}">{{$employee->name}}</option>
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
