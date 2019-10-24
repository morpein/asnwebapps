<?php
	$dsn="sqlite:/tmp/notes.sqlite";
	$dbuser="usuario";
	$dbpass="secreto";

	$db = new PDO( $dsn,$dbuser,$dbpass);

	// Set errormode to exceptions
	$db->setAttribute(PDO::ATTR_ERRMODE, 
		PDO::ERRMODE_EXCEPTION);

	$query="CREATE TABLE notes (
		id INTEGER PRIMARY KEY AUTOINCREMENT, 
		title TEXT, 
		text TEXT, 
		hidden INTEGER)";
	
	try {
		$db->exec($query);
	} catch (PDOException $e) {
		//Table already created
		header("Location: .");
		exit();
	}

	$query="INSERT INTO notes (title,text,hidden) VALUES
		('first','Hello world',0),
		('second','Hidden',1);";
	$db->exec($query);

	header("Location: .");
	exit();
?>
