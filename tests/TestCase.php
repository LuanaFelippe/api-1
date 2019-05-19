<?php

namespace Test;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
       dic('db')->transaction = 'BEGIN';
    }

    public function tearDown(): void
    {
        dic('db')->transaction = 'ROLLBACK';
    }

    protected static function assertDatabaseHas(string $table, array $data, $rows = 1)
    {
        $query = dic('db')->$table();

        foreach ($data as $column => $value) {
            $query->where($column, $value);
        }

        self::assertEquals($rows, $query->count());
    }

    protected static function assertDatabaseMissing(string $table, array $data)
    {
        $query = dic('db')->$table();

        foreach ($data as $column => $value) {
            $query->where($column, $value);
        }

        self::assertFalse((bool) $query->fetch());
    }
}
