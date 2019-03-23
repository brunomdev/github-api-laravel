<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 * Class UserRepositoryResource
 *
 * @category Resource
 * @package  App\Http\Resources\Api
 * @author   Bruno Marcel <bruno.m.dev@gmail.com>
 * @license  NO-LICENCE #
 * @link     #
 */
class UserRepository extends JsonResource
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
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'html_url' => $this->resource->html_url,
        ];
    }
}
