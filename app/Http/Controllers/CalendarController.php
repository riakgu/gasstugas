<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;

        $events = $tasks->map(function ($task) {
            return [
                'title' => $task->task_name,
                'start' => $task->deadline,
                'category' => $task->category,
                'extendedProps' => $task,
            ];
        });

        return view('calendar.index', [
            'title' => 'Calendar',
            'events' => $events,
        ]);
    }
}