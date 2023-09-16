<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    public function index(): View 
    {
        $categories=Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create(): View   
    {
        return view ('categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request -> all());
        return redirect()->route('categories.index');
    //     $data = $request->all();
    
    // // Verificar si 'name_category' está presente en los datos del formulario
    // if (isset($data['name_category'])) {
    //     Category::create([
    //         'name_category' => $data['name_category']
    //     ]);
    // } else {
    //     // Puedes manejar aquí lo que sucede si 'name_category' no se proporciona
    //     // Puedes mostrar un mensaje de error o tomar otras acciones según tus necesidades.
    // }

    // return redirect()->route('categories.index');
    }

    public function edit(Category $category): View   
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function show(Category $category):View
    {
        return view('categories.show', compact('category'));
    }
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
