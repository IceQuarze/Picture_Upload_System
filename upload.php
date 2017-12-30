<?php
	$extension = end(explode(".", $_FILES["file"]["name"]));
	$allow_exts = array("jpg", "png", "gif", "webp");
	if((($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/png")
		|| ($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/webp"))
	&& in_array($extension,$allow_exts)){
		move_uploaded_file($_FILES['file']['tmp_name'],"upload/" . $_FILES["file"]["name"]);

		$pdo=new PDO("mysql:host=localhost;dbname=pic","pic","12345678");
		$pdo->exec("insert into images (name,url)values('" . explode('.',$_FILES["file"]["name"])[0] . "','upload/" . $_FILES["file"]["name"] . "')");

		echo "Upload to upload/" . $_FILES["file"]["name"];
	}else{
		echo "Error format." . "<br>";
	}
?>
