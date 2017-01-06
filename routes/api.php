<?php

$api = app('Dingo\Api\Routing\Router');

// v1 version API
// choose version add this in header    Accept:application/vnd.lumen.v1+json
$api->version('v1', [
    'namespace' => 'App\Api\Controllers\V1',
    'middleware' => ['cors'],
], function ($api) {

});