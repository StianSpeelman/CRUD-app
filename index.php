<?php
    require 'includes/DBH.conn.php';
?>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<title>ToDo-List</title>
		<link href="images/favicon.png" rel="icon" type="image/png" />
	</head>
<body>
    <nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
			Special thanks to: </a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="task-primary">Simple ToDo List</h3>
		<hr style="border-top:1pc dotted #ccc;"/>
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<center>
			<form method="POST" class="form-inline" action="includes/add.php">
			<input type="text" class="form-control" name="task" required/>
			<button class="btn btn-primary form-control" name="add">Add Task</button>
		</form>
	</center>
</div>
<br /><br /><br />
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Task</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
			$count = 1;
			while($fetch = $query->fetch_array()){
				?>
			<tr>
				<td><?php echo $count++?></td>
				<td><?php echo $fetch['task']?></td>
				<td><?php echo $fetch['status']?></td>
				<td colspan="2">
					<center>
						<?php
							if($fetch['status'] != "Done"){
								echo 
									'<a href="includes/update_task_stat.php?task_id='.$fetch['task_id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> |';
							}
							?>
						<a href="includes/delete.php?task_id=<?php echo $fetch['task_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
						</center>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>