<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserRepositoryCollection;
use App\Http\Resources\Api\User;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class UserController
 *
 * @category Controller
 * @package  App\Http\Controllers\Api
 * @author   Bruno Marcel <bruno.m.dev@gmail.com>
 * @license  NO-LICENCE #
 * @link     #
 */
class UserController extends Controller
{

    /**
     * Get Github User by username
     *
     * @param string $username Github Username
     *
     * @return User|JsonResponse
     */
    public function get(string $username)
    {
        try {
            $client = new Client(['base_uri' => config('github.api_url')]);

            $response = $client->request('GET', 'users/' . $username);

            if ($response->getStatusCode() === 200) {
                $body = $response->getBody();

                $content = json_decode($body->getContents());

                return new User($content);
            }
        } catch (GuzzleException $e) {
            report($e);
        }

        return response()
            ->json(
                [
                    'errors' => [
                        'status' => 404,
                        'title' => 'User not found!',
                        'detail' => sprintf(
                            'User "%s" not found in GitHub.',
                            $username
                        )
                    ]
                ],
                404
            );
    }

    /**
     * Get Github User Repositories by username
     *
     * @param string $username Github Username
     *
     * @return UserRepositoryCollection|JsonResponse
     */
    public function getRepos(string $username)
    {
        try {
            $client = new Client(['base_uri' => config('github.api_url')]);

            $response = $client->request('GET', 'users/' . $username . '/repos');

            if ($response->getStatusCode() === 200) {
                $body = $response->getBody();

                $content = collect(json_decode($body->getContents()));

                return new UserRepositoryCollection($content);
            }
        } catch (GuzzleException $e) {
            report($e);
        }

        return response()
            ->json(
                [
                    'errors' => [
                        'status' => 404,
                        'title' => 'User not found!',
                        'detail' => sprintf(
                            'User "%s" not found in GitHub.',
                            $username
                        )
                    ]
                ],
                404
            );
    }
}
