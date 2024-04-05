<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Home",
            "tasks" => [],
            "total_task" => 0,
            "undone_task" => 0
        ];

        return view('home.index', $data);
    }
}
