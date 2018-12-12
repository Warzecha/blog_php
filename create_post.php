<?php



$name2blog = fopen("name2blog.txt", "r");




$userHasBlog = false;

while(!feof($name2blog)) {
    $line =  explode(": " , fgets($name2blog));
    if($line[0] == $_POST["username"])
    {
        $userHasBlog = true;
        $blogname = trim($line[1]);
        
    }
  }

  
  if(!$userHasBlog)
  {
      echo "You dont have any blogs";
  }
  else
  {
    $infofile = fopen($blogname . "/info.txt", "r");
    $user =  explode(": " , fgets($infofile))[1];
    $pwd_hash = explode(": " , fgets($infofile))[1];


    if(trim(md5($_POST["pwd"])) == trim($pwd_hash))
    {

        $post = fopen($blogname . "/". str_replace("-","",$_POST["createdAt"]) . str_replace(":","",$_POST["time"]). str_pad(getdate()["seconds"], 2, '0', STR_PAD_LEFT) . ".pst", "w");
 
        fwrite($post, $_POST["title"] . "\n");
        fwrite($post, $_POST["username"] . "\n");
        fwrite($post, $_POST['desc']);


        $total = sizeof($_FILES);

        // echo "rozmiar: " . $total;

        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {
        

          //Get the temp file path
          $tmpFilePath = $_FILES['file']['tmp_name'];

          echo $tmpFilePath;
        
          //Make sure we have a file path
          if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = $blogname. "/" . str_replace("-","",$_POST["createdAt"]) . str_replace(":","",$_POST["time"]). str_pad(getdate()["seconds"], 2, '0', STR_PAD_LEFT). $i . "." . explode("." , $_FILES['file']['name'])[1] ;
        
            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
        
                
              //Handle other code here
        
            }
          }
        }
        


        fclose($post);

        echo "Adding post is successful <br>";
        echo "<a href='blog.php'><button>More blogs</button></a><br/>";


    }
    else
    {
        echo "The password is incorrect \n";
    
    }



  }









?>