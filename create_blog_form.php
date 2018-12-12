<html>
<head>
<title>Create file</title>
<meta http-equiv="Content-Type" content="text/html" />
<link href="../../css/382.css" rel="stylesheet" type="text/css" />

</head>
<body style="padding:5px; background:url(../../images/blu-bg.gif);">

  <?php include 'menu.php'?> 


<h1>Create blog</h1>


<form action="create_blog.php" method="POST">

  Blog name<br>
  <input type="text" name="blogname"><br>

  Description<br>
  <textarea name="desc"> 
  </textarea>
<br>


  User name <br>
  <input type="text" name="username"><br>

  Password <br>
  <input type="password" name="psw"><br>

  <input type="submit" value="submit">
  <button type="reset" value="Reset">Reset</button>

</form>


</body>
</html>

