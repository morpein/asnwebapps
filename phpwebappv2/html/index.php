<?php

#	$dsn="sqlite:/tmp/notes.sqlite";
#	$dbuser="usuario";
#	$dbpass="secreto";

	$dsn="mysql:host=mariadb;dbname=notesdb";
	$dbuser="usuario";
	$dbpass="secreto";

	$db = new PDO($dsn, $dbuser, $dbpass);

	// Set errormode to exceptions
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$query = "INSERT INTO notes (title,text,hidden) VALUES (" .
				"'${_POST['title']}','${_POST['text']}',0 );";
		$db->exec($query);
		header("Location: " . $_SERVER['REQUEST_URI']);
		exit();
	}

	$query="SELECT * FROM notes";

	if ($_GET['id']) {
		$vmodel['note']= $db->query($query." WHERE id=  ${_GET['id']}")
							->fetch();
		include('views/note.php');
	} else {
		$vmodel['notes'] = $db->query($query);
		include("views/notes.php");
	}

?>
