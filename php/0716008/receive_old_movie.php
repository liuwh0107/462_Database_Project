<table border="1">
<tr>
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
$rating = $_POST['rating'];
$gender= $_POST['gender'];
$age= $_POST['age'];

$sql_str="SELECT m.id,g.rating,g.votes, g.avg_$age ,g.num_$age FROM movie m, $gender g WHERE m.title='$title'  and m.id=g.id";
//echo $sql_str;

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
   
    $ans = $result->fetch_assoc();
    $id=$ans['id'];
    $nums='num_'.$age;
    $avgs='avg_'.$age;
    $num=$ans[$nums];
    $avg=$ans[$avgs];
//newly added
    $votes=$ans['votes'];
    $total_rating=$ans['rating'];//former rating average of all ages
    
    $sql_up="UPDATE $gender SET $avgs=($avg*$num+$rating)/($num+1), $nums=$num+1,rating=($total_rating*$votes+$rating)/($votes+1),votes=$votes+1 where $gender.id = '$id'"; 
    
   // echo $sql_up;
    $sql="$sql_up";
    if (!$result = $mysqli->query($sql)) {
        // Oh no! The query failed. 
        echo "Sorry, the website is experiencing problems.";
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }

    $sql_str="SELECT m.title, g.avg_$age ,g.num_$age FROM movie m, $gender g WHERE m.id='$id' and m.id=g.id";
    echo $sql_up."\n";
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
    $country='title';
    $best_movie='rating';
    
    echo '<tr><td>',$country,'</td>';
    echo '<td>',$best_movie,'</td>';
    while ($actor = $result->fetch_assoc()) {    
        echo '<tr><td>',$actor['title'],'</td>';
        echo '<td>',$actor[$avgs],'</td>';
     
    }
    
    $result->free();
    $mysqli->close();
?>
</tr>
</table>


<table border="1">
<tr>
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
$rating = $_POST['rating'];
$gender= $_POST['gender'];
$age= $_POST['age'];

$sql_str="SELECT m.id,g.rating,g.votes, g.avg_$age ,g.num_$age FROM movie m, all_gender g WHERE m.title='$title'  and m.id=g.id";
//echo $sql_str;

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
   
    $ans = $result->fetch_assoc();
    $id=$ans['id'];
    $nums='num_'.$age;
    $avgs='avg_'.$age;
    $num=$ans[$nums];
    $avg=$ans[$avgs];

    $votes=$ans['votes'];
    $total_rating=$ans['rating'];//former rating average of all ages
    
    $sql_up="UPDATE all_gender SET rating=($total_rating*$votes+$rating)/($votes+1),votes=$votes+1,$avgs=($avg*$num+$rating)/($num+1), $nums=$num+1 where all_gender.id = '$id'"; 
    
   // echo $sql_up;
    $sql="$sql_up";
    if (!$result = $mysqli->query($sql)) {
        // Oh no! The query failed. 
        echo "Sorry, the website is experiencing problems.";
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }

    $sql_str="SELECT m.title, g.avg_$age ,g.num_$age FROM movie m, $gender g WHERE m.id='$id' and m.id=g.id";
    echo $sql_up."\n";
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
    $country='title';
    $best_movie='rating';
    
    echo '<tr><td>',$country,'</td>';
    echo '<td>',$best_movie,'</td>';
    while ($actor = $result->fetch_assoc()) {    
        echo '<tr><td>',$actor['title'],'</td>';
        echo '<td>',$actor[$avgs],'</td>';
     
    }
    
    $result->free();
    $mysqli->close();
?>
</tr>
</table>
