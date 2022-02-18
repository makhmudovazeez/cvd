<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/**
 * @version 1.0.0
 */

Route::group([
    'prefix' => 'V1'
], function (Router $router){

    /* Authorization routes begin */
    $router->group([
        'prefix' => 'auth'
    ], function (Router $router) {
        $router->post('login', [AuthorizationController::class, 'login']);
        $router->group(['middleware' => ['access.token']], function (Router $router) {
            $router->match(['put', 'patch'], 'refresh-token', [AuthorizationController::class, 'refreshToken']);
        });
    });
    /* Authorization routes end */



    /* Organization routes begin */
    $router->group([
        'prefix' => 'organization'
    ], function (Router $router) {
        $router->get('', [OrganizationController::class, 'index']);
        $router->get('{id}', [OrganizationController::class, 'show']);
    });
    /* Organization routes end */



    /* Employee routes begin */
    $router->group([
        'prefix' => 'employee'
    ], function (Router $router) {
        $router->get('', [EmployeeController::class, 'index']);
        $router->get('{id}', [EmployeeController::class, 'show']);
    });
    /* Employee routes end */
});
