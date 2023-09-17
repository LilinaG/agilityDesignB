<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index(): JsonResource
    {
        return CategoryResource::collection(Category::all());
    }

    public function create(): JsonResponse
    {
        $category = Category::create([
            "name"=> $request->name
        ]);
        return response()->json([
            "status"=> true,
       ], 200);
    }
    
        public function store(CategoryRequest $request):JsonResponse
        {
                $category = Category::create($request->all());
                return response()->json([
                'success'=> true,
                'data'=> $category //vigilar aquí que podría ser mediante objeto
            ], 201);//201 significa estado de registro creado satisfactoriamente
        }

        public function destroy(string $id):JsonResponse 
        {
            Category::find($id)->delete();
            return response()->json([
                'success'=> true
            ], 200);
        }
    }
    