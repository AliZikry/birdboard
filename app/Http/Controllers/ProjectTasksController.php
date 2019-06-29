<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

use App\Task;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {

        request()->validate(['body' => 'required']);

        $project->addTask(request('body'));

        return back();
    }

    public function update(Project $project , Task $task)
    {

        // request()->validate(['body' => 'required']);
        $task->update(request()->validate(['body' => 'required']));

        // ORIGINAL TRY
        // $task->update([
        //     'body' => request('body'),
        //     'completed' => request()->has('completed')
        // ]);


        // REFACTOR 1
        // $task->update(['body' => request('body')]);
        // REFACTOR 2
        // $method = request('completed') ? 'complete' : 'incomplete';

        // REFACTOR 1
        // if (request()->has('completed')) {
        //     $task->complete();
        // }
        // REFACTOR 2
        // $task->$method();

        // REFACTOR 3
        request('completed') ? $task->complete() : $task->incomplete();


        return back();
    }
}
