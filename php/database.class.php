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

		if($this->validate_input($fname, $lname, $email)){
			$sql_s->bindValue(1, $fname, PDO::PARAM_STR);
			$sql_s->bindValue(2, $lname, PDO::PARAM_STR);
			

			$non_duplicate = $this->check_entry($email);

			if($non_duplicate){
				$sql_s->bindValue(3, $email, PDO::PARAM_STR);
				$sql_s->execute();
				return true;
			}
			
			else{
				return false;
			}
		}

		else{
			echo "INVALID INPUT";
			return false;
		}
	}

	private function check_entry($user_email){
		/* Checks whether an email has already
		been entered into the database.  Returns
		true if it is not already entered.*/

		$sql_s = $this->connection->prepare("SELECT email from nametable WHERE email = ?");
		$sql_s->bindValue(1, $user_email, PDO::PARAM_STR);
		$sql_s->execute();
		$row = $sql_s->fetch(PDO::FETCH_ASSOC);
		
		if(!$row){
			return true;
		}

		else{
			return false;
		}
	}

	public function retrieve_data(){
		$sql_s = $this->connection->prepare("SELECT firstname, lastname from nametable");
		$sql_s->execute();
		$result = $sql_s->setFetchMode(PDO::FETCH_ASSOC);

		echo "<table><tr><th>NAME</th><th>LASTNAME</th><tr>";
		while($r = $sql_s->fetch()){
			echo "<tr><td>".$r['firstname']."</td><td>".$r["lastname"]." "."</td></tr>";
			
		}
		echo "</table>";
	}

	private function validate_input($fname, $lname, $email){
		/*
		This function will validate the entered first name,
		last name and email.
		*/

		//Validity of all input
		$valid_input = True;

		//Validate first name and last name.
		//fname and lname should only allow letters and whitespace
		$valid_fname = preg_match("/^[a-zA-Z ]*$/", $fname);
		$valid_lname = preg_match("/^[a-zA-Z ]*$/", $lname);

		//Validate the entered email
		$valid_email = filter_var($email, FILTER_VALIDATE_EMAIL);

		if(!$valid_fname or !$valid_lname or !$valid_email){
			$valid_input = False;
		}

		return $valid_input;
	}
}


?>