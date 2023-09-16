<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class DatabaseConnectionTest extends TestCase
{
    public function testDatabaseConnection(): void
    {
        $this->assertTrue(DB::connection()->getPdo() instanceof \PDO);
    }
}


