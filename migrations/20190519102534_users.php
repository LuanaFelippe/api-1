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
			->addColumn('status', 'boolean', ['default' => false,'null' => false])
            ->create(); 
    }
	
	public function up()
    {
        // query()
        $stmt = $this->query('SELECT name, username, status FROM users WHERE status = 1'); // returns PDOStatement
        $rows = $stmt->fetchAll(); // returns the result as an array
    }
}
