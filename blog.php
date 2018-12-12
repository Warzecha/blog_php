<?php

include "menu.php";



if($_GET['blogname'])
{
    if(!is_dir($_GET['blogname']))
    {
        echo "No blog with this name found";
    }else

    {
        $dir = new DirectoryIterator($_GET['blogname']);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                // var_dump($fileinfo->getFilename());
        
                if($fileinfo->getFilename() != "info.txt")
                {
                    $path = $_GET['blogname'] . "/" . $fileinfo->getFilename();

                    if(explode(".", $fileinfo->getFilename())[1] == "pst")
                    {
                       

                        $post = fopen($path, "r");
                        $title =  fgets($post);
                        $author = fgets($post);
                        $desc = fgets($post);
                                
                        echo "<h1>" . $title . "</h1><br>";
                        echo "<h2>By " . $author . "</h2><br>";
                        echo "<p>" . $desc . "</p><br><br>";
                        echo "<a href='add_comment_form.php?blog=" . $_GET['blogname'] . "&post=" . $fileinfo->getFilename() . "'><button>Add a comment</button></a><br/>";
        
                        if(is_dir($_GET['blogname']. "/". explode(".", $fileinfo->getFilename())[0] . ".k"))
                        {
                            $dir_com = new DirectoryIterator($_GET['blogname']. "/". explode(".", $fileinfo->getFilename())[0] . ".k");
                            foreach ($dir_com as $comment) {
                                if (!$comment->isDot()) {
                                    // var_dump($comment->getFilename());
                            
                                    if($comment->getFilename() != "info.txt")
                                    {
                                        $path_com = $_GET['blogname'] . "/" . explode(".", $fileinfo->getFilename())[0] . ".k" . "/" . $comment->getFilename();
                    


                                        if(explode(".", $comment->getFilename())[1] == "txt")
                                        {
                                           
                    
                                            $com = fopen($path_com, "r");
                                            $type =  fgets($com);
                                            $arr = fgets($com);
                                            $name = fgets($com);
                                            $opinion = fgets($com);
                                                    
                                            echo "<h4>" . $type . " comment by ". $name." : '". $opinion . "'</h4><br>";
    
                                            // echo "<p>" . $desc . "</p><br><br>";
                                            // echo "<a href='add_comment_form.php?blog=" . $_GET['blogname'] . "&com=" . $comment->getFilename() . "'><button>Add a comment</button></a><br/>";
                            
                                            fclose($com);
                    
                                        }
                    
                    
                    
                                    }
                      
                                }
                            }

                        }





                        fclose($post);

                    }


                    if(@is_array(getimagesize($path))){
                        echo "<img src='./" . $path . "' alt='post image'>";
                    }


                    // komentarze


                    // if(explode(".", $fileinfo->getFilename())[1] == "k")
                    // {






                    // }










                }
  
            }
        }
    }

}
else
{

    $dir = new DirectoryIterator(".");
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot() && is_dir($fileinfo)) {
            // var_dump($fileinfo->getFilename());
    
            if($fileinfo->getFilename() != ".git")
            echo "<a style='background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            width: 150px;
            margin-top: 30px;
            font-size: 16px;' href='?blogname=" . $fileinfo->getFilename(). "'>" . $fileinfo->getFilename() . "</a> <br>";


            
                
              




    
    
    
        }
    }

}



?>