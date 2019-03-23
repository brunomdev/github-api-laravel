<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Class UsersApiReposTest
 *
 * @category Tests
 * @package  Tests\Feature
 * @author   Bruno Marcel <bruno.m.dev@gmail.com>
 * @license  NO-LICENCE #
 * @link     #
 */
class UsersApiReposTest extends TestCase
{
    /**
     * Test Api Users Repositories endpoint with Success
     *
     * @return void
     */
    public function testGetUserReposSuccess()
    {
        $response = $this->json(
            'GET',
            'api/users/octocat/repos'
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        0 => [
                            'id',
                            'name',
                            'description',
                            'html_url'
                        ]
                    ]
                ]
            );
    }

    /**
     * Test Api Users Repositories endpoint without repositories
     *
     * @return void
     */
    public function testGetUserReposEmpty()
    {
        $response = $this->json(
            'GET',
            'api/users/eniacc/repos'
        );

        $response
            ->assertStatus(200)
            ->assertJsonCount(0, 'data');
    }

    /**
     * Test Api Users Repositories endpoint with User Not Found
     *
     * @return void
     */
    public function testGetUserNotFoundRepos()
    {
        $response = $this->json(
            'GET',
            'api/users/testuseruser/repos'
        );

        $response
            ->assertStatus(404)
            ->assertNotFound()
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
