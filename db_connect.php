<?php
function db(){
  global $link;
  $link = mysqli_connect("localhost", "test", "test", "todolist") or die("Coud not connect to db.");
  return $link;
}
?>
