<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;

        return view('tasks.index', [
            'title' => 'Tasks',
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        $categories = auth()->user()->categories;

        return view('tasks.create', [
            'title' => 'Create Task',
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required'],
            'task_name' => ['required'],
            'description' => ['required'],
            'deadline' => ['required', 'date', 'after_or_equal:today'],
            'status' => ['required'],
        ]);

        $task = auth()->user()->tasks()->create($validated);

        return redirect('/tasks')->with('success', 'Task has been created!');
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        $categories = auth()->user()->categories;

        return view('tasks.edit', [
            'title' => 'Edit Task',
            'task' => $task,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'category_id' => ['required'],
            'task_name' => ['required'],
            'description' => ['required'],
            'deadline' => ['required', 'date', 'after_or_equal:today'],
            'status' => ['required'],
        ]);

        $task->update($validated);

        return redirect('/tasks')->with('success', 'Task has been updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks')->with('success', 'Task has been deleted!');
    }
}
