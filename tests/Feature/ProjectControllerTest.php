<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;

class ProjectControllerTest extends TestCase
{
    public function test_get_projects_list()
    {
        $response = $this->get('admin/projects');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            ['title',
            'description',
            'image',
            'url',
            'category_id',]
        ]);
        $response->assertJsonFragment(['title' => ])
    }
}
