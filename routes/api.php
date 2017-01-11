<?php

$api = app('Dingo\Api\Routing\Router');

// v1 version API
// choose version add this in header    Accept:application/vnd.lumen.v1+json
$api->version('v1', [
    'namespace' => 'App\Api\Controllers\V1',
], function ($api) {
    
    /*
    |------------------------------------------------
    | User Routes
    |------------------------------------------------
    */

    // 已删除列表
    $api->get('/users/trashed', ['as' => 'users.trashed', 'uses' => 'UsersController@trashedIndex']);

    // 显示已删除 User
    $api->get('/users/trashed/{id}', ['as' => 'users.show', 'uses' => 'UsersController@trashedShow']);

    // 恢复
    $api->put('/users/{id}/restore', ['as' => 'users.update', 'uses' => 'UsersController@restore']);

    // 列表 User
    $api->get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);

    // 创建 User
    $api->post('/users', ['as' => 'users.store', 'uses' => 'UsersController@store']);

    // 显示 User
    $api->get('/users/{id}', ['as' => 'users.show', 'uses' => 'UsersController@show']);

    // 更新 User
    $api->put('/users/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);

    // 删除 User
    $api->delete('/users/{id}', ['as' => 'users.update', 'uses' => 'UsersController@destroy']);

    //:end-routes:
});