@extends('layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tasks</h4>
                        @can('create tasks')
                            <a href="{{route('tasks.create')}}" class="btn btn-primary pull-right"><i
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
                                        <th>Employee</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$task->text}}</td>
                                            <td>{{$task->manager->name??''}}</td>
                                            <td>{{$task->employee->name??''}}</td>
                                            <td>{{$task->status}}</td>
                                            <td>
                                                @can('update tasks')
                                                    <a href="{{route('tasks.edit',$task->id)}}"
                                                       class="btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>
                                                @endcan
                                                @can('delete tasks')
                                                    <a onclick="fireDeleteEvent({{$task->id}})" type="button"
                                                       class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                                                    <form action="{{route('tasks.destroy',$task->id)}}" method="POST"
                                                          id="form-{{$task->id}}">
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
