@extends('layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Departments</h4>
                        @can('create departments')
                            <a href="{{route('departments.create')}}" class="btn btn-primary pull-right"><i
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
                                        <th>name</th>
                                        <th>Manager</th>
                                        <th>Employees count</th>
                                        <th>Total salaries</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($departments as $department)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$department->name}}</td>
                                            <td>{{$department->manager->name??''}}</td>
                                            <td>{{$department->employees_count}}</td>
                                            <td>{{$department->salaries}}</td>
                                            <td>
                                                @can('update departments')
                                                    <a href="{{route('departments.edit',$department->id)}}"
                                                       class="btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                                                @endcan
                                                @can('delete departments')
                                                    <a onclick="fireDeleteEvent({{$department->id}})" type="button"
                                                       class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                                                    <form action="{{route('departments.destroy',$department->id)}}"
                                                          method="POST" id="form-{{$department->id}}">
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
