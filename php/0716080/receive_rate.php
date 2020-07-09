<?php
    $mysqli = new mysqli('localhost', 'root', 'password', 'project');

// Oh no! A connect_errno exists so the connection attempt failed!
    if ($mysqli->connect_errno) {
        echo "Sorry, this website is experiencing problems.";

        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
    
        exit;
}
 
    $title= $_POST['title']; 
    $sql_str="SELECT m.title FROM movie m WHERE m.title='$title'";

    $sql="$sql_str";
    if (!$result = $mysqli->query($sql)) {
        // Oh no! The query failed. 
        echo "Sorry, the website is experiencing problems.";
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }
    if ($result->num_rows === 0) {
        echo "這部電影不在database中,是否新增電影並為其評分";
        $action="insert.php"; 
    
    }
    else{
    //echo '<div style="font-size:1.25em;color:red">avg_rating_of_director(movie>30) </div>';
  
    $ans = $result->fetch_assoc();
    echo "是否為 ".$ans['title']." 評分";
    $action="rate_old_movie.php";  
    }
    $result->free();
    $mysqli->close();


?>

<form action="<?php echo $action; ?>" method="post">
<input type='hidden' name='title' value="<?php echo $title; ?>" >
<input type='submit'  value='我要評分'>
</form>

<form action="info.php" method="post">
<input type='submit'  value='算了,我累了'>
</form>
