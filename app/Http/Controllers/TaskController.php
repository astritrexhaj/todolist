<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', auth()->user()->id)
                ->filterByRequest($request)
                ->latest()
                ->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'sometimes',
        ]);

        $task = new Task();

        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->priority = $data['priority'];
        $task->user_id = auth()->user()->id;
        $task->saveOrFail();

        return redirect(route('tasks'))->with('message', 'Task created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'sometimes',
            'status' => 'required',
        ]);

        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->priority = $data['priority'];
        $task->user_id = auth()->user()->id;
        $task->status = $data['status'];
        $task->updateOrFail();

        return redirect()->back()->with('message', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->deleteOrFail();

        return redirect(route('tasks'))->with('message', 'Task Deleted Successfully!');
    }
}
