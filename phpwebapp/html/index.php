<?php
	$dbfile="/tmp/notes.sqlite";
	$dsn = "sqlite:".$dbfile;
	$dbuser = "usuario";
	$dbpass = "secreto";

	require "./dbutil.php";
	checkDatabase($dbfile,$dbuser,$dbpass);

	// Get db connection and set errormode to exceptions
	$db = new PDO($dsn, $dbuser, $dbpass
		,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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
