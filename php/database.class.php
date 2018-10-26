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
		$sql_s = $this->connection->prepare("INSERT INTO nametable (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");

		//Bind the values to the statement
		$sql_s->bindValue(':firstname', $fname);
		$sql_s->bindValue(':lastname', $lname);
		$sql_s->bindValue(':email', $email);


		//Execute the SQL statement
		$sql_s->execute();
	}

}


?>