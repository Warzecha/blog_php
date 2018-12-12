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

<h1>Add comment</h1>


<form action="add_comment.php" method="POST" enctype="multipart/form-data">


  User name <br>
  <input type="text" name="name"><br>


    Opinion <br>
    <select name="type">
  <option value="positive">Positive</option>
  <option value="neutral">Neutral</option>
  <option value="negative">Negative</option>

</select>
<br>


  Comment<br>
  <textarea name="comment"> 
  </textarea>
<br>



  Date <br>
  <input type="date" name="createdAt" value="<?php echo date('Y-m-d'); ?>" /> <br>

  Time <br>
  <input type="time" name="time" /> <br>

   <input type="hidden" name="blog" value="<?php echo $_GET['blog']; ?>">
   <input type="hidden" name="post" value="<?php echo $_GET['post']; ?>">

<br>


  <input type="submit" value="submit">
  <button type="reset" value="Reset">Reset</button>

</form>


</body>
</html>


