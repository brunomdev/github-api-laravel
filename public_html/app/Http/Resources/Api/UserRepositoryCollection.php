<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class UserRepositoryCollectionResource
 *
 * @category Resource
 * @package  App\Http\Resources\Api
 * @author   Bruno Marcel <bruno.m.dev@gmail.com>
 * @license  NO-LICENCE #
 * @link     #
 */
class UserRepositoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request Request Object
     *
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
