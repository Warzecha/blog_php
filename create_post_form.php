<html>
<head>
<title>Create file</title>
<meta http-equiv="Content-Type" content="text/html" />
<!-- <link href="../../css/382.css" rel="stylesheet" type="text/css" /> -->

</head>
<body style="padding:5px; background:url(../../images/blu-bg.gif);">

  <div>
    <?php include 'menu.php';?> 

  </div>

<h1>Create post</h1>


<form action="create_post.php" method="POST" enctype="multipart/form-data">


  User name <br>
  <input type="text" name="username"><br>

  Password <br>
  <input type="password" name="psw"><br>



  Title<br>
  <input type="text" name="title"><br>

  Blogpost<br>
  <textarea name="desc"> 
  </textarea>
<br>



  Date <br>
  <input type="date" name="createdAt" value="<?php echo date('Y-m-d'); ?>" /> <br>

  Time <br>
  <input type="time" name="time" /> <br>

<br>




  <input type="file" name="file" multiple>



  <input type="submit" value="submit">
  <button type="reset" value="Reset">Reset</button>

</form>


</body>
</html>


