<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index()
    {
        $tasks=Task::all();
        return view('list',compact('tasks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(CreateTaskRequest $request)
    {
        $task = new Task();
        $task->title=$request->input('title');
        $task->content=$request->input('content');
        $task->due_date=$request->input('dd');
        $task->save();
        Session::flash('success','Add Task Successfully');
        return redirect()->route('task.index');
    }
}
