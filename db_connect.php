<?php
// connect to database
function db() {
    global $link;
    
    // Create connection with error handling
    $link = mysqli_connect("localhost", "root", "", "todolist");
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    return $link;
}
