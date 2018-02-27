<?php require_once("db_connect.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Todo list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/materia/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <h2>Todo list</h2>
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
          $description = $row['todoDescription'];
          $date = $row['date'];
      ?>
      <ul class="list-group">
        <li class="list-group-item"> <a href data-toggle="modal" data-target="#<?php echo $id ?>"><?php echo $title ?></a> [<?php echo $date ?>] </li>
      </ul>
      <!-- Modal -->
      <div class="modal fade" id="<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo $title ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo $description ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div>
        </div>
      </div>
      <?php
        }
      }
      ?>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button type="button" class="btn btn-primary" onclick="window.location.href='create.php'">Add item</button>
      </nav>
    </div>
  </body>
</html>
