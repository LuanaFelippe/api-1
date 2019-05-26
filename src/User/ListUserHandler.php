<?php

namespace Api\User;

use NotORM;

class ListUserHandler
{
    private $db;
	private $users = array();

    public function __construct(NotORM $db)
    {
        $this->db = $db;
    }

    public function __invoke(Name $name)
    {
		if(isset($name){
			$query = "SELECT name, user, status FROM users WHERE name LIKE '%" .$name. "%' AND status = 1";
		} else {
			$query = "SELECT name, user, status FROM users WHERE status = 1";
		}
		
		$this->users = db->executeSelectQuery($query);
		return $this->users;
    }
}
