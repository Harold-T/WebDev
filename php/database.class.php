<?php

class Database{

	private $connection;
	public function __construct($DSN, $USR, $PWD)
	{
		try
		{
			$this->connection = new PDO(DSN, USR, PWD);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		catch(PDOException $e)
		{
			echo "FAILED";
			echo $e;
		}
	}

	public function insert_data($fname, $lname, $email){

		//Prepare the SQL statement
		$sql_s = $this->connection->prepare("INSERT INTO nametable (firstname, lastname, email) VALUES (?, ?, ?)");
		
		//Bind the values to the statement
		$sql_s->bindValue(1, $fname, PDO::PARAM_STR);
		$sql_s->bindValue(2, $lname, PDO::PARAM_STR);
		$sql_s->bindValue(3, $email, PDO::PARAM_STR);


		//Execute the SQL statement
		$sql_s->execute();
	}

}


?>