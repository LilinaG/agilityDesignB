<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectController extends Controller
{
 
    public function index():JsonResource
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create():View
    {
        $categories = Category::all();
        return view('projects.create', compact('categories'))->with('success', 'Proyecto creado');  
    }

    public function store(ProjectRequest $request):RedirectResponse
    {
        //Project::create($request->all());
        //return redirect()->route('projects.index');
        $data = $request->all();
        $data['category_id'] = 1; // Asigna un valor predeterminado o el ID de una categoría válida
        Project::create($data);
        return redirect()->route('projects.index');
    }

    public function edit(Project $project):View
    {
        $categories = Category::all();
        return view('projects.edit', compact ('project', 'categories'));
    }

    public function update(ProjectRequest $request, Project $project):RedirectResponse
    {
        $project->update($request->all());
        $categories = Category::all();
        return redirect()->route('projects.index', compact('project', 'categories'))->with('success', 'Proyecto modificado');
    }

    public function show(Project $project):View
    {
        return view('projects.show', compact('project'));
    }

    public function destroy(Project $project):RedirectResponse
    {
        $project->delete();
        return redirect()->route('projects.index')->with('danger', 'Proyecto eliminado');
    }
}
