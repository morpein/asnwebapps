<?php $note=$vmodel['note'] ?>
<html>
	<head> </head>
	<body>
		<h1>Note detail</h1>
			<p>Id: <?=$note['id']?></p>
			<p>Title: <?=$note['title']?></p>
			<p>Message:  <?=$note['text']?></p>
			<p>Hidden:   <?=$note['hidden']?></p>
	<hr>
	<em>Server: <?=$_SERVER['SERVER_ADDR'] ?> </em>
	<em>Worker: <?=gethostname() ?> </em>

	</body>
</html>
