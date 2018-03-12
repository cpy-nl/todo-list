<?php ini_set('display_errors', 1); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Todo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/materia/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container-fluid">
		<h1>Todo</h1>
		<div class="task-list">
			<ul>
				<?php
				require_once 'includes/connect.php';
				global $link;
				$query = "SELECT id, task FROM tasks";
				$result = mysqli_query($link, $query);

				// check for data
				if(mysqli_num_rows($result) >= 1){
					while( $row = mysqli_fetch_array($result) ){
						$task_id = $row['id'];
						$task_name = $row['task'];
						echo '<li>
									<span>'.$task_name.'</span>
									<img id="'.$task_id.'" class="btn-delete" width="10px" src="images/close.svg" />
									</li>';
					}
				}
				?>
			</ul>
		</div>
		<div class="fixed-bottom">
			<form class="add-new-task" autocomplete="off">
				<input type="text" name="new-task" placeholder="Add a new item..." />
				<button type="submit" class="btn btn-primary btn-lg btn-block">Add</button>
			</form>
		</div>
	</div>
</body>
	<!-- Some JS stuff -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script>

		add_task();
		delete_task();

    function add_task() {
			$('.add-new-task').submit(function(){
				var new_task = $('.add-new-task input[name=new-task]').val();
				if(new_task != ''){
					$.post('includes/add-task.php', {task: new_task}, function(data) {
						$('.add-new-task input[name=new-task]').val('');
						$(data).appendTo('.task-list ul').hide().fadeIn();
						delete_task();
		    	});
		  	}
				return false; // Ensure that the form does not submit twice
		  });
		}

		function delete_task() {
			$('.btn-delete').click(function(){
				var current_element = $(this);
				var id = $(this).attr('id');
				$.post('includes/delete-task.php', {task_id: id}, function() {
					current_element.parent().fadeOut("fast", function() { $(this).remove(); });
				});
			});
		}
		</script>
</html>
