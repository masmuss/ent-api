<?php

namespace Tests\Unit\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenerationTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}