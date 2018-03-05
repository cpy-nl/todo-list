<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/materia/bootstrap.min.css">
    <title>Create item</title>
  </head>
  <body>
    <div class="navbar navbar-expand-lg navbar-light bg-light">
      <h1>Create item</h1>
      <button class="btn btn-secondary btn-large" type="button" onclick="window.location.href='index.php'">Back</button>
    </div>
    <div class="container-fluid" style="margin-top:3rem;">
      <form class="form-group" method="post" action="create.php">
       <h2>Title</h2>
       <input class="form-control" name="todoTitle" type="text" placeholder="Enter your title"><br />
       <h2>Notes (optional)</h2>
       <input class="form-control" name="todoDescription" type="text" placeholder="Enter your notes">
       <br><br>
       <input type="submit" name="submit" value="submit">
      </form>
    </div>
  </body>
</html>

<?php
require_once("db_connect.php");

if(isset($_POST['submit'])) {
  $title = $_POST['todoTitle'];
  $description = $_POST['todoDescription'];

  // make connection to db
  db();
  global $link;
  $query = "INSERT INTO todo(todoTitle, todoDescription, date) VALUES ('$title', '$description', now() )";
  $insertTodo = mysqli_query($link, $query);
  if($insertTodo){
    echo "success!";
  } else {
    echo mysql_error($link);
  }
  mysqli_close($link);
}
 ?>
