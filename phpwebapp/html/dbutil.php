<?php

	//Initializes database if not already created
	function checkDatabase($dbFile,$dbuser,$dbpass) {
		if ( !file_exists($dbFile) ) {
			$dsn="sqlite:".$dbFile;
			initDatabase($dsn,$dbuser,$dbpass);		
		}
	}

	//Create DB and add sample data
	function initDatabase($dsn, $dbuser, $dbpass) {
		$db = new PDO($dsn, $dbuser, $dbpass
			,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	
		$query="CREATE TABLE notes (
			id INTEGER PRIMARY KEY AUTOINCREMENT, 
			title TEXT, 
			text TEXT, 
			hidden INTEGER)";
		
		try {
			$db->exec($query);
		} catch (PDOException $e) {
			//Table already created
			$db=null; //force closing the connection
			return;
		}
	
		$query="INSERT INTO notes (title,text,hidden) VALUES
			('first','Hello world',0),
			('second','Hidden',1);";
		$db->exec($query);
	
		$db=null; //force closing the connection
	}
  
?>
