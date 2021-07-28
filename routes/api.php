<?php

use App\Http\Controllers\Api\V1\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

JsonApiRoute::server('v1')
    ->prefix('v1')
    ->middleware('auth:api')
    ->resources(function ($server) {
        $server->resource('items', ItemController::class)->actions(function ($actions) {
            $actions->delete('purge');
        });;
    });
