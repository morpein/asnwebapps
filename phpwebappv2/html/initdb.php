<?php
#	$dsn="sqlite:/tmp/notes.sqlite";
#	$dbuser="usuario";
#	$dbpass="secreto";

	$dsn="mysql:host=mariadb;dbname=notesdb";
	$dbuser="usuario";
	$dbpass="secreto";

	$db = new PDO( $dsn,$dbuser,$dbpass);

	// Set errormode to exceptions
	$db->setAttribute(PDO::ATTR_ERRMODE, 
		PDO::ERRMODE_EXCEPTION);
## SQlite DDL
#	$query="CREATE TABLE notes (
#		id INTEGER PRIMARY KEY AUTOINCREMENT, 
#		title TEXT, 
#		text TEXT, 
#		hidden INTEGER)";
## MariaDB/Mysql DDL	
	$query="CREATE TABLE notes (
		id INTEGER PRIMARY KEY AUTO_INCREMENT,
		title VARCHAR(30),
		text VARCHAR(255),
		hidden INTEGER)";
	try {
		$db->exec($query);
	} catch (PDOException $e) {
		//Table already created
		print_r($db->errorInfo());
		//header("Location: .");
		exit();
	}

	$query="INSERT INTO notes (title,text,hidden) VALUES
		('first','Hello world',0),
		('second','Hidden',1)";
	$db->exec($query);

	header("Location: .");
	exit();
?>
