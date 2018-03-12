<?php ini_set('display_errors', 1); ?>

<?php
$task = strip_tags( $_POST['task'] );
$date = date('Y-m-d');
$time = date('H:i:s');

require_once 'connect.php';
//insert new data in db:
global $link;
mysqli_query($link, "INSERT INTO tasks(task, date, time) VALUES ('$task', '$date', '$time')");

// fetch new row from db
$result = mysqli_query($link, "SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'");

while($row = mysqli_fetch_array($result) ){
	$task_id = $row['id'];
	$task_name = $row['task'];
}
mysqli_close($link);

echo '<li><span>'.$task_name.'</span><img id="'.$task_id.'" class="btn-delete" width="10px" src="images/close.svg" /></li>';
?>
