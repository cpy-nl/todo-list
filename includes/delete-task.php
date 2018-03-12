<?php
$task_id = strip_tags( $_POST['task_id'] );

require 'connect.php';
global $link;
$query = "DELETE FROM tasks WHERE id='$task_id'";
mysqli_query($link, $query);

?>
