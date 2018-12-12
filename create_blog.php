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


		$name2blog = fopen("name2blog.txt", "a");
		fwrite($name2blog, $_POST["username"] . ": " . $_POST["blogname"] . "\n");

		fclose($name2blog);
		fclose($infofile);


	}



?>
