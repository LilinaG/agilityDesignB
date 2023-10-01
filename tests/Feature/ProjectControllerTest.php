<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;

class ProjectControllerTest extends TestCase
{
    public function test_get_projects_list()
    {
        $response = $this->get('api/admin/projects');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            ['title',
            'description',
            'image',
            'url',
            'category_id',]
        ]);
        $response->assertJsonFragment(['title' => 'Logo Club Canino Xanastur' ]);
        $response->assertJsonCount(4);
    }

    public function test_get_project_detail()
    {
        $response = $this->get('api/admin/projects/1');
        $response->assertJsonStructure(['title','description','image','url','category_id',]);
        $response->assertJsonFragment(['title' => 'Logo Club Canino Xanastur' ]);
    }

    // public function test_get_non_existing_user_detail()
    // {
    //     $response = $this->get('api/admin/projects/255');
    //     $response->assertStatus(404);
    // }


    public function test_create_project()
{
    // Datos de ejemplo para crear un proyecto
    $data = [
        'title' => 'Nuevo Proyecto',
        'description' => 'Descripción del nuevo proyecto',
        'image' => 'imagen.png',
        'url' => 'https://ejemplo.com',
        'category_id' => 1
    ];

    $response = $this->post('api/admin/projects', $data);

    // Verificar que la creación sea exitosa (código de respuesta 201)
    $response->assertStatus(201);

    // Verificar la estructura del JSON de respuesta
    $response->assertJsonStructure(['title', 'description', 'image', 'url', 'category_id']);

    // Verificar que el proyecto se haya creado correctamente en la base de datos
    $this->assertDatabaseHas('projects', $data);
}

}
