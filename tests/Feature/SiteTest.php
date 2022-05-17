<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class SiteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_displays()
    {
        $response = $this->get('/');
        $response->assertSee('My Recipes');
    }

    public function test_login_screen_displays(){

        $response = $this->get('/login');
        $response->assertSee('My Recipes');
    }
}
