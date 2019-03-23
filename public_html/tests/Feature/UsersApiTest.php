<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUsers()
    {
        $response = $this->json(
            'GET',
            'api/users/test/'
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'id',
                    'login',
                    'name',
                    'avatar_url',
                    'html_url'
                ]
            );
    }

    public function testUsersRepo()
    {
        $response = $this->json(
            'GET',
            'api/users/test/repos'
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    0 => [
                        'id',
                        'login',
                        'name',
                        'avatar_url',
                        'html_url'
                    ]
                ]
            );
    }
}
