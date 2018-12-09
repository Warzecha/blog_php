<?php





	if(is_dir($_POST["blogname"]))
	{
		echo "Blog with this name already exists";

	}else
	{

		mkdir($_POST["blogname"]);

		$infofile = fopen($_POST["blogname"] . "/info.txt", "w");
		fwrite($infofile, "user: " . $_POST["username"] . "\n");
		fwrite($infofile, "pwd_hash: " . md5($_POST["pwd"]) . "\n");
		fwrite($infofile, "description: '" . $_POST["desc"] . "'\n"); 

	}



?>
