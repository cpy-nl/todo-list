<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/materia/bootstrap.min.css">
    <title>Je moet connected zijn...</title>
  </head>
  <body>
    <div class="container">
      <h1>
        <?php
        if(db()) {
          echo "Booyakasha!"
        }
        endif;
        ?>
      </h1>
    </div>
  </body>
</html>
