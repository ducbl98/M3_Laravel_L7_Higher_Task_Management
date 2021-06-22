@extends('home')
@section('title', 'Task list')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Tasks List</h1></div>
        </div>
    </div>

    <div class="col-12">
        @if (Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
            </p>
        @endif
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Due Date</th>
            <th scope="col">Image</th>

        </tr>
        </thead>
        <tbody>
        @forelse($tasks as $key=>$task)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->content}}</td>
                <td>{{$task->due_date}}</td>
                <td>{{$task->image}}</td>
                {{--                <td><a href="{{route('customers.edit',$customer->id)}}">Sửa</a></td>--}}
                {{--                <td><a href="{{route('customers.destroy',$customer->id)}}">Xóa</a></td>--}}
            </tr>
        @empty
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <a class="btn btn-primary" href={{route('task.create')}}>Add Task</a>
@endsection
