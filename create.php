<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/materia/bootstrap.min.css">
    <title>Create item</title>
  </head>
  <body>
    <div class="container">
      <h1>Create item</h1>
      <form method="post" action="create.php">
       <label for="todoTitle">Title</label>
       <input id="todoTitle" name="todoTitle" type="text" placeholder="enter your title"><br />
       <label for="todoDescription">Notes</label>
       <input id="todoDescription" name="todoDescription" type="text" placeholder="enter your notes">
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
