<?php

use Dingo\Api\Routing\Router;

$api = app('Dingo\Api\Routing\Router');

// v1 version API
// choose version add this in header    Accept:application/vnd.lumen.v1+json
$api->version('v1', [
    'namespace' => 'App\Api\Controllers\V1',
    //'middleware' => ['cors'],
], function (Router $api) {
    
    /*
    |------------------------------------------------
    | User Routes
    |------------------------------------------------
    */

    // 已删除列表
    $api->get('users/trashed', ['as' => 'users.trashed', 'uses' => 'UsersController@trashedIndex']);

    // 显示已删除 User
    $api->get('users/trashed/{id}', ['as' => 'users.trashed.show', 'uses' => 'UsersController@trashedShow']);

    // 恢复
    $api->put('users/{id}/restore', ['as' => 'users.restore', 'uses' => 'UsersController@restore']);

    // 资源列表
    $api->resource('users', 'UsersController');

    //:end-routes:
});