<?php
	$pdo=new PDO("mysql:host=localhost;dbname=pic","pic","12345678");
	$query=$pdo->query("select * from images order by id desc");
	while($items=$query->fetch()){
		$arr = explode('.',$items[2]);
		echo " Name: " . $items[1] . " Format: " . end($arr) . "<br>";
		echo "<img src=\"" . $items[2] . "\"/><br><hr><br>";
	}
?>
