<?php

use Phinx\Migration\AbstractMigration;

class Users extends AbstractMigration
{
    public function change()
    {
    	$this->table("users")
        	->addColumn('name', 'string', ['null' => false, 'limit' => 255])
            ->addColumn('username', 'string', ['null' => false, 'limit' => 255])
            ->addColumn('password', 'string', ['null' => false, 'limit' => 255])
            ->create(); 
    }
}
