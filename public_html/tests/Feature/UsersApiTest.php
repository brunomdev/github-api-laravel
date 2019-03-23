<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Class UsersApiTest
 *
 * @category Tests
 * @package  Tests\Feature
 * @author   Bruno Marcel <bruno.m.dev@gmail.com>
 * @license  NO-LICENCE #
 * @link     #
 */
class UsersApiTest extends TestCase
{
    /**
     * Test Api Users endpoint with Success
     *
     * @return void
     */
    public function testGetUserSuccess()
    {
        $response = $this->json(
            'GET',
            'api/users/octocat'
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        'id',
                        'login',
                        'name',
                        'avatar_url',
                        'html_url'
                    ]
                ]
            );
    }

    /**
     * Test Api Users endpoint with User Not Found
     *
     * @return void
     */
    public function testGetUserNotFound()
    {
        $response = $this->json(
            'GET',
            'api/users/testerroruser'
        );

        $response
            ->assertStatus(404)
            ->assertJsonStructure(
                [
                    'errors' => [
                        'title',
                        'detail'
                    ]
                ]
            );
    }
}
