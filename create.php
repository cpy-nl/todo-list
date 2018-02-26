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
       <p>Todo title: </p>
       <input name="todoTitle" type="text">
       <p>Todo description: </p>
       <input name="todoDescription" type="text">
       <br>
       <input type="submit" name="submit" value="submit">
      </form>
    </div>
  </body>
</html>
