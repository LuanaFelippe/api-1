<?php

function dic($key, $value = null)
{
    if ($value) {
        return stash($key, $value);
    }

    $hash = md5($key);
    $cache = stash($hash);

    if ($cache) {
        return $cache;
    }

    $value = stash($key);

    if (is_callable($value)) {
        return stash($hash, $value());
    }

    return $value;
}

dic('pdo', function() {
    $config   = config('db');
    $host     = getenv('DB_HOST') ?: $config['host'];
    $dbname   = getenv('DB_NAME') ?: $config['dbname'];
    $username = getenv('DB_USERNAME') ?: $config['username'];
    $password = getenv('DB_PASSWORD') ?: $config['password'];

    $dsn = sprintf('mysql:dbname=%s;host=%s;port=3306', $dbname, $host);

    $pdo = new PDO($dsn, $username, $password, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
        
    $pdo->exec("SET time_zone='" . date('P') . "'");
    
    return $pdo;
});

dic('db', function() {
    $pdo = dic('pdo');
    $db  = new NotORM($pdo);
    $db->jsonAsArray = true;
    
    if (config('debug')) {
        La\Tool\NotOrmTracyPanel::simpleInit($db, $pdo);
    }
    
    return $db;
});
