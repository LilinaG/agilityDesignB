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
 
    public function index():JsonResponse
    {

        return response()->json(Project::all(), 200);
    }

   public function create(Request $request): JsonResponse
{
    $project = Project::create([
        "title" => $request->title,
        "description" => $request->description,
        "image" => $request->image,
        "url" => $request->url,
        "category_id" => $request->category_id
    ]);

    return response()->json([
        "status" => true,
    ], 200);
}

    public function store(ProjectRequest $request):JsonResponse

    {
        $data = $request->only(['title', 'description', 'image', 'url', 'category_id']);

        $project = Project::create($data);
    
        return response()->json([
            'success' => true,
            'data' => $project
        ], 201);
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
        $project->image = $request->image;
        $project->url = $request->url;
        $project->category_id = $request->category_id;
        $project->save();
        return response()->json([
            'success'=> true,
            'data'=> $project
        ], 200);
    }
    public function show($id):JsonResponse 
    {
        $project = Project::find($id);
        return response()->json($project, 200);
    }

    public function destroy(int $id):JsonResponse 
    {
        $project = Project::find($id);
        if (!$project) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
        $project->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
