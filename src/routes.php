<?php

map(['/', '/home'], function() { 
    return [
        'routes' => ['/users']
    ]; 
});

map('/users', function(NotORM $db) {
    $handler = new Api\User\ListUserHandler($db);
    return $handler();
});

