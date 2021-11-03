<?php
	require_once 'DBH.conn.php';
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];

			$conn->query("INSERT INTO `task` VALUES('', '$task', '')");
			header('location:../index.php');
		}
	}
?>