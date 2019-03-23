<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(
    function () {
        Route::prefix('users')->group(
            function () {
                Route::get('{username}', 'UserController@get');
                Route::get('{username}/repos', 'UserController@getRepos');
            }
        );
    }
);

Route::fallback(
    function () {
        return response()->json(['message' => 'Not Found!'], 404);
    }
);
