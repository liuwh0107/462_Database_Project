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
    $title = $_POST['title'];
    $country=$_POST['country'] ;
    $genere= $_POST['genre'];
    $rating = $_POST['rating'];
    $title= $_POST['title'];
    $duration= $_POST['duration'];
    $gender= $_POST['gender'];
    $director = $_POST['director'];
    $age= $_POST['age'];
    $start= $_POST['year'];
    echo $title;
?>
