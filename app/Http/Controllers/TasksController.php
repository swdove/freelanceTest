<?php

namespace FreelanceTest\Http\Controllers;

use Illuminate\Http\Request;
use FreelanceTest\Task;
class TasksController extends Controller
{
    public function index () {
        $tasks = Task::all();

        // return $tasks;
     
         return view('tasks.index')->with('tasks', $tasks);
        
    }

    public function show(Task $task) {
        return view('tasks.show')->with('task', $task);
    }
}
