<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{
    /**
     * Loads user url for securing it's charging properly
     * @test
     */
    function loads_users()
    {
        $this->get('/usuarios')
                    ->assertStatus(200)
                    ->assertSee('Listado de usuarios')
                    ->assertSee('Patata')
                    ->assertSee('Perito');
    }

    /** @test */
    function loads_empty_users_default_message_if_not_users()
    {
        $this->get('/usuarios?empty')
                    ->assertStatus(200)
                    ->assertSee('No hay usuarios disponibles');
    }

    /** @test */
    function loads_user_id(){

        $this->get('/usuarios/25')
                    ->assertStatus(200)
                    ->assertSee("La id de mi usuario es la siguiente: 25");
    }

    /** @test */
    function loads_new_user_page(){

        $this->get('/usuarios/nuevo')
                ->assertStatus(200)
                ->assertSee("El usuario nuevo se ha creado correctamente");
    }
}
