<?php require_once("db_connect.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/materia/bootstrap.min.css">
    <title>Todo list</title>
  </head>
  <body>
    <div class="navbar navbar-expand-lg navbar-light bg-light">
      <h1>Todo list</h1>
      <button type="button" class="btn btn-primary" onclick="window.location.href='create.php'">Add item</button>
    </div>
    <div class="container-fluid" style="margin-top:3rem;">
      <ul class="list-group">
      <?php
      db();
      global $link;
      $query = "SELECT id, todoTitle, todoDescription, date FROM todo";
      $result = mysqli_query($link, $query);
      // check if there is data
      if(mysqli_num_rows($result) >= 1){
        while($row = mysqli_fetch_array($result)){
          $id = $row['id'];
          $title = $row['todoTitle'];
          $date = $row['date'];
      ?>
        <li class="list-group-item"><a href="item.php?id=<?php echo $id ?>"><?php echo $title ?></a> [<?php echo $date ?>]</li>

      <?php
        }
      }
      ?>
      </ul>
    </div>

  </body>
</html>
