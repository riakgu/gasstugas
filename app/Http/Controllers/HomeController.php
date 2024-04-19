<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->whereNot('status', 'DONE')->whereDate('deadline', today())->get();
        $total_tasks = auth()->user()->tasks()->count();
        $undone_tasks = auth()->user()->tasks()->whereNot('status', 'DONE')->count();
        $total_user = User::all()->count();
        $total_category = auth()->user()->categories()->count();

        return view('home.index', [
            'title' => 'Home',
            'tasks' => $tasks,
            'total_task' => $total_tasks,
            'undone_task' => $undone_tasks,
            'total_user' => $total_user,
            'total_category' => $total_category,
        ]);
    }
}
