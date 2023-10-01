<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/projects'); // Reemplaza '/projects' con la ruta real de tu index
        $response->assertStatus(200);
        // Agrega más aserciones según sea necesario para verificar el contenido de la respuesta.
    }

    public function testStore()
    {
        $data = [
            'title' => 'Nuevo Proyecto',
            'description' => 'Descripción del proyecto',
            'photo' => 'Imagen del proyecto',
            // Agrega más datos según sea necesario para el método store.
        ];

        $response = $this->post('/projects', $data); // Reemplaza '/projects' con la ruta real de tu store
        $response->assertStatus(201);
        // Agrega más aserciones según sea necesario para verificar la respuesta y los datos almacenados en la base de datos.
    }

    public function testShow()
    {
        $project = Project::factory()->create(); // Crea un proyecto ficticio para la prueba
        $response = $this->get("/projects/{$project->id}"); // Reemplaza '/projects/{$project->id}' con la ruta real de tu show
        $response->assertStatus(200);
        // Agrega más aserciones según sea necesario para verificar el contenido de la respuesta.
    }
}
