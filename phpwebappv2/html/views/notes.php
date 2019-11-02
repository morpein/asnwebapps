<html>
	<head> </head>
	<body>
		<h1>My Notes</h1>
		<ul>
			<? foreach ($vmodel['notes'] as $n): ?>
				<li>
				Id: <a href='index.php?id=<?=$n['id']?>'><?=$n['id']?></a>
				Title: <?=$n['title']?>
				Message:  <?=$n['text']?>
				Hidden:   <?=$n['hidden']?>
				</li>
			<? endforeach ?>
		</ul>
		<form method="POST" >
			<input name="title" placename="Title"/>
			<input name="text" placename="Text"/> 
			<input type="checkbox" name="hidden" value="1">
			<input type="submit" name="Send"/>
		</form>
	<hr>
	<em>Server: <?=$_SERVER['SERVER_ADDR'] ?> </em>
	<em>Worker: <?=gethostname() ?> </em>

	</body>
</html>
