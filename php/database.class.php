<?php

class Database{

	private $connection;
	public function __construct($DSN, $USR, $PWD)
	{
		try
		{
			$this->connection = new PDO(DSN, USR, PWD);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO nametable (firstname, lastname) VALUES ('yay', 'Bucke')";
			$this->connection->exec($sql);
		}

		catch(PDOException $e)
		{
			echo "FAILED";
			echo $e;
		}

	}
}


?>