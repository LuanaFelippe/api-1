<?php

namespace Test\User;

use Test\TestCase;
use Api\User\ListUserHandler;

class ListUserHandlerTest extends TestCase
{
    public function test_list_all_users()
    {
        // Arrange
        $users =  create('users', [], 5);

        // Act
        $handler = new ListUserHandler(dic('db'));
        $data = $handler();

        // Assert 
        self::assertCount(5, $data);
    }
}
