<?php declare(strict_types=1);

namespace App\Model;

class UsersModel extends TableModel
{
	// Start Coding!

	/**
	 * Contains database connection
	 * @var dbConn PDO Object
	 */
	private $dbConn;

	public function __construct()
	{
		$this->dbConn = $this->conn();
	}

	public function getConn()
	{
		return $this->dbConn;
	}
}