<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {

        $projects = auth()->user()->projects()->orderBy('updated_at' , 'desc')->get();

        return view('projects.index', compact('projects'));

    }

    public function show(Project $project)
    {
        if (auth()->id() !== $project->owner_id) {
            # code...
            abort(403);
        }
        // $project = Project::findOrFail(request('project'));
        return view('projects.show', compact('project'));
    }

    public function store()
    {

        //vaidate
        $attributes = request()->validate([

            'title' => 'required' ,
            'description' => 'required',
            'notes' => 'nullable'

        ]);

        /* $attributes['owner_id'] = auth()->id(); */
        $project = auth()->user()->projects()->create($attributes);
        return redirect($project->path());


        //persist
        //Project::create($attributes); we skiped this part by mixing it in the validation stage


        //redirect
        return redirect('/projects');

    }

    public function edit(Project $project)
    {
        return view('projects.edit' , compact('project'));
    }

    public function create(){

        return view('projects.create');
    }

    public function update(Project $project)
    {

        $attributes = request()->validate([

            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable'

        ]);

        $project->update($attributes);

        return back();
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
