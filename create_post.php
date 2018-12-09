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

        $psot = fopen($blogname . "/". str_replace("-","",$_POST["createdAt"]) . str_replace(":","",$_POST["time"]). str_pad(getdate()["seconds"], 2, '0', STR_PAD_LEFT) . ".pst", "w");
 

        $total = count($_FILES['files']['name']);

        echo "rozmiar: " . sizeof($_FILES);

        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {
        
          //Get the temp file path
          $tmpFilePath = $_FILES['files']['tmp_name'][$i];

          echo $tmpFilePath;
        
          //Make sure we have a file path
          if ($tmpFilePath != ""){
            //Setup our new file path
            $newFilePath = $blogname. "/" . $_FILES['files']['name'][$i];
        
            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
        
                
              //Handle other code here
        
            }
          }
        }
        




    }
    else
    {
        echo "The password is incorrect \n";
    
    }



  }









?>