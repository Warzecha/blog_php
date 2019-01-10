<html>
<head>
<title>Create file</title>
<meta http-equiv="Content-Type" content="text/html" />

</head>
<body style="padding:5px;);" onload="getTime()">


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
  <input id="dateInput" type="text" name="createdAt" onchange="checkDate(this)" /> <br>


  Time <br>
  <input id="timeInput" type="text" name="time" onchange="checkTime(this)"/> <br>

<br>




  <input id="defaultFile" type="file" name="file" onclick="addedFile()">

  <br>

  <input type="submit" value="submit">
  <button type="reset" value="Reset">Reset</button>

</form>


</body>
</html>


