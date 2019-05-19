<?php

namespace Api\User;

use NotORM;

class ListUserHandler
{
    private $db;

    public function __construct(NotORM $db)
    {
        $this->db = $db;
    }

    public function __invoke()
    {
        return $this->db->users();
    }
}
