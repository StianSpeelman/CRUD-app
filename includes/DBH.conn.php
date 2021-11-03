<?php 
    $conn = new mysqli("localhost", "root", "", "todo_db");

    if(!$conn){
        die("Error: Cannot connect to database");
    }
?>