<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeUsersTest extends TestCase
{
    /** @test */
    public function comprobar_saludo_con_nickname()
    {
        $this->get('/saludo/pepito/metakiller69')
                        ->assertStatus(200)
                        ->assertSee("Te llamas Pepito y tu apodo es metakiller69");
    }

    /** @test */
    public function comprobar_saludo_sin_nickname()
    {
        $this->get('/saludo/pepito')
                        ->assertStatus(200)
                        ->assertSee("¡Hola Pepito!");
    }


}
