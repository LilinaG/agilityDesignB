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
        return ProjectResource::collection(Project::all());
    }

    public function create(): JsonResponse
{
    $project = Project::create([
        "title"=> $request->title,
        "description"=> $request->description,
        "photo"=>$request->photo,
        "url"=>$request->url
    ]);
    return response()->json([
        "status"=> true,
   ], 200);
}

    public function store(ProjectRequest $request):JsonResponse
    {
            $project = Project::create($request->all());
            return response()->json([
            'success'=> true,
            'data'=> $project //vigilar aquí que podría ser mediante objeto
        ], 201);//201 significa estado de registro creado satisfactoriamente
    }

    public function edit($id): JsonResponse
    {
        
            $project = Project::find($id);
        
            if (!$project) {
                return response()->json(['error' => 'Proyecto no encontrado'], 404);
            }
        
            $categories = Category::all();
        
            return response()->json([
                'project' => $project,
                'categories' => $categories,
                'message' => 'Recurso recuperado satisfactoriamente'
            ], 200);
    }
    

    public function update(ProjectRequest $request, $id):JsonResponse 
    {
        $project = Project::find($id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->phot = $request->photo;
        $project->save();
        return response()->json([
            'success'=> true,
            'data'=> $project//Objeto??
        ], 200);
    }
    public function show($id):JsonResponse 
    {
        $project = Project::find($id);
        return response()->json($project, 200);
    }

    public function destroy(string $id):JsonResponse 
    {
        Project::find($id)->delete();
        return response()->json([
            'success'=> true
        ], 200);
    }
}
