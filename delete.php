<?php
require_once "db_connect.php";
if(isset($_GET['id'])){
    $id = (int)$_GET['id']; // Cast to integer for security
    db();
    global $link;
    $query = "DELETE FROM todo WHERE id = ?"; // Use prepared statement
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $delete = mysqli_stmt_execute($stmt);
    if($delete){
        echo 'Todo successfully deleted';
        header("Location: index.php"); // Redirect back to todo list
        exit();
    } else {
        echo "Error deleting todo: " . mysqli_error($link);
    }
}