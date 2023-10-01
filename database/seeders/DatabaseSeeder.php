<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    
        Category::factory(5)->create();
        Project::factory(25)->create();
    }
}
