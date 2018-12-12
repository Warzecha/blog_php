<?php
    $dir_com = explode(".",$_POST["post"])[0].'.k';
	$dir_name = $_POST["blog"];
    // echo $dir;
	if(!file_exists($dir_name.'/'.$dir_com))
	{
        mkdir($dir_name.'/'.$dir_com,0777);
		

    }
    
    $path = $dir_name.'/'.$dir_com;



    $fi = new FilesystemIterator($path, FilesystemIterator::SKIP_DOTS);
    $count = iterator_count($fi);


    $path2 = $dir_name.'/'.$dir_com . "/" . ($count + 1) . ".txt";



    $comment_file = fopen($path2, "w");
    fwrite($comment_file, $_POST['type'] . "\n");
    fwrite($comment_file, getdate() . "\n");
    fwrite($comment_file, $_POST['name'] . "\n");
    fwrite($comment_file, $_POST['comment'] );

    fclose($comment_file);
    
    echo "Comment successful <br>";
    echo "<a href='blog.php'><button>More blogs</button></a><br/>";
	
    ?>