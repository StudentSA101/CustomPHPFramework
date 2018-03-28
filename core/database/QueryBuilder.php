<?php 

class QueryBuilder
{

	protected $pdo;

	public function __construct($pdo)
	{

		$this->pdo = $pdo;

	}
	//Fetch all users
	function get_users($table)
	{
			// Prepares the statement
		$statement = $this->pdo->prepare("SELECT * FROM {$table} ORDER BY id ASC");

			// Executes the SQL query
		$statement->execute();

			// Fetches all the data queried and stores them as objects. 
		return  $statement->fetchAll(PDO::FETCH_CLASS);

	}	
	//Create new users
	function set_users($table,$data)
	{
			
		$setWhere = 0;
		foreach($data as $name => $entry) 	
		{
			//Algorithm created to insert data into correct columns
			if($setWhere === 0)
			{
				$statement = $this->pdo->prepare("INSERT INTO {$table} ({$name}) VALUES ('{$entry}')");

				// Executes the SQL query
				$statement->execute();
				//seleted the newest id in order to insert the rest of the data. 
				$id = $this->pdo->prepare("SELECT id FROM {$table} WHERE {$name} = '{$entry}' ORDER BY id DESC LIMIT 1");
				$id->execute();
				$id = $id->fetchAll(PDO::FETCH_OBJ);
				$WhereStat = $id;					
			}	
			if($setWhere === 1)
			{

				$statement = $this->pdo->prepare("UPDATE {$table} SET {$name} = '{$entry}' WHERE id = '{$WhereStat[0]->id}'");
				
				// Executes the SQL query
				$statement->execute();
				
			}
			//setWhere to 1 in order to prevent the first query from running again.  The second query will then proceed to update the row that was created. 
			$setWhere = 1;		
		}
		

			
		return  true;

	}	


	//Show users saved data
	function update_users($table,$id)
	{
			// Prepares the statement
		$statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id}");

			// Executes the SQL query
		$statement->execute();

			// Fetches all the data queried and stores them as objects. 
		return  $statement->fetchAll(PDO::FETCH_CLASS);

	}	
	//edit users data
	function edit_users($table,$data,$id)
	{

		foreach($data as $name => $entry) 	
		{

				$statement = $this->pdo->prepare("UPDATE {$table} SET {$name} = '{$entry}' WHERE id = {$id}");
					
				// Executes the SQL query
				$statement->execute();
				
		}
			
		return  true;
	}

	//Delete users
	function delete_user($table,$id)
	{
			// Prepares the statement
		$statement = $this->pdo->prepare("DELETE FROM {$table}
		WHERE id = {$id[0]}" );

			// Executes the SQL query
		$statement->execute();

			// Fetches all the data queried and stores them as objects. 
		return  TRUE;

	}	


}

