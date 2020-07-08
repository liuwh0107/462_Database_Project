<?php
    $mysqli = new mysqli('localhost', 'root', '', 'project');

// Oh no! A connect_errno exists so the connection attempt failed!
    if ($mysqli->connect_errno) {
        echo "Sorry, this website is experiencing problems.";

        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
    
        exit;
}
$rating = $_POST['rating'];
$gender= $_POST['gender'];
$age= $_POST['age'];
$award= $_POST['award'];

?>

