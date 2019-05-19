<?php

function create(string $table, array $data = [], int $times = 1) {
    $function = "{$table}_factory";
    $rows = [];

    if (! function_exists($function)) {
            exit("Factory not found. Create a factory function [$function] in factories.php");
        }

    for ($i = 0; $i < $times; $i++) {
            $mergedData = array_merge($function(), $data);
    
            $rows[] = dic('db')->$table->insert($mergedData)->jsonSerialize();
        }

    return $times == 1 ? current($rows) : $rows;
}
