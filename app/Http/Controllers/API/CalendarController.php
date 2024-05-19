<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function calendar()
    {
        $tasks = auth()->user()->tasks;

        $events = $tasks->map(function ($task) {
            return [
                'task_name' => $task->task_name,
                'category' => $task->category->category_name,
                'description' => $task->description,
                'deadline' => $task->deadline,
                'status' => $task->status
            ];
        });

        return response()->json([
            'status' => 'success',
            'events' => $events->groupBy('deadline'),
        ], 200);
    }
}
