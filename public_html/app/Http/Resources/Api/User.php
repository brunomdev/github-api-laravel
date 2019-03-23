<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 * Class UserResource
 *
 * @category Resource
 * @package  App\Http\Resources\Api
 * @author   Bruno Marcel <bruno.m.dev@gmail.com>
 * @license  NO-LICENCE #
 * @link     #
 */
class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request Request Object
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'login' => $this->resource->login,
            'name' => $this->resource->name,
            'avatar_url' => $this->resource->avatar_url,
            'html_url' => $this->resource->html_url,
        ];
    }
}
