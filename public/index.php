<?php

require __DIR__ . '/../vendor/autoload.php';

ini_set('date.timezone', 'America/Recife');

define('APP_PATH', realpath(__DIR__ . '/../'));

$config = config(parse_ini_file(sprintf('%s/config/local.ini', APP_PATH), true));
    
config($config);

try {
	return json(dispatch(dic('db')));
} catch(Exception $e) {
    status(500);
    
    json([
        'status' => 'error',
        'message' => $e->getMessage(),
        'code' => $e->getCode()
    ]);
}
