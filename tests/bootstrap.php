<?php

define('APP_PATH', realpath(__DIR__ . '/../'));

require APP_PATH . '/vendor/autoload.php';
require APP_PATH . '/tests/helpers.php';
require APP_PATH . '/tests/factories.php';

$configFile = sprintf('%s/config/local.ini', APP_PATH);

config(parse_ini_file($configFile, true));
