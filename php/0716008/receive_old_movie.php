
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

$sql_str="SELECT m.id FROM movie m, $gender g WHERE m.title='$title'  and m.id=g.id";
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
    


$sql='SELECT * from all_gender where id="'.$id.'";';

  if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

// Phew, we made it. We know our MySQL connection and query 
// succeeded, but do we have a result?
if ($result->num_rows === 0) {
    // Oh, no rows! Sometimes that's expected and okay, sometimes
    // it is not. You decide. In this case, maybe actor_id was too
    // large? 
    echo "We could not find a match for ID $aid, sorry about that. Please try again.";
    exit;
}

echo '<div style="font-size:1.25em;color:red">All_Gender </div>';


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['id']}&nbsp{$actor['rating']}&nbsp{$actor['votes']}&nbsp{$actor['avg_0_18']}&nbsp{$actor['num_0_18']}&nbsp{$actor['avg_18_30']}&nbsp{$actor['num_18_30']}&nbsp{$actor['avg_30_45']}&nbsp{$actor['num_30_45']}&nbsp{$actor['avg_45up']}&nbsp{$actor['num_45up']}";
  echo "</pre>";
  
}

 $sql='SELECT * from male where id="'.$id.'";';

  if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

// Phew, we made it. We know our MySQL connection and query 
// succeeded, but do we have a result?
if ($result->num_rows === 0) {
    // Oh, no rows! Sometimes that's expected and okay, sometimes
    // it is not. You decide. In this case, maybe actor_id was too
    // large? 
    echo "We could not find a match for ID $aid, sorry about that. Please try again.";
    exit;
}

echo '<div style="font-size:1.25em;color:red">Male </div>';


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['id']}&nbsp{$actor['rating']}&nbsp{$actor['votes']}&nbsp{$actor['avg_0_18']}&nbsp{$actor['num_0_18']}&nbsp{$actor['avg_18_30']}&nbsp{$actor['num_18_30']}&nbsp{$actor['avg_30_45']}&nbsp{$actor['num_30_45']}&nbsp{$actor['avg_45up']}&nbsp{$actor['num_45up']}";
  echo "</pre>";
  
}

 $sql='SELECT * from female where id="'.$id.'";';

  if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

// Phew, we made it. We know our MySQL connection and query 
// succeeded, but do we have a result?
if ($result->num_rows === 0) {
    // Oh, no rows! Sometimes that's expected and okay, sometimes
    // it is not. You decide. In this case, maybe actor_id was too
    // large? 
    echo "We could not find a match for ID $aid, sorry about that. Please try again.";
    exit;
}

echo '<div style="font-size:1.25em;color:red">Female </div>';


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['id']}&nbsp{$actor['rating']}&nbsp{$actor['votes']}&nbsp{$actor['avg_0_18']}&nbsp{$actor['num_0_18']}&nbsp{$actor['avg_18_30']}&nbsp{$actor['num_18_30']}&nbsp{$actor['avg_30_45']}&nbsp{$actor['num_30_45']}&nbsp{$actor['avg_45up']}&nbsp{$actor['num_45up']}";
  echo "</pre>";
  
}

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
$sql='SELECT * from all_gender where id="'.$id.'";';

  if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

// Phew, we made it. We know our MySQL connection and query 
// succeeded, but do we have a result?
if ($result->num_rows === 0) {
    // Oh, no rows! Sometimes that's expected and okay, sometimes
    // it is not. You decide. In this case, maybe actor_id was too
    // large? 
    echo "We could not find a match for ID $aid, sorry about that. Please try again.";
    exit;
}

echo '<div style="font-size:1.25em;color:red">All_Gender </div>';


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['id']}&nbsp{$actor['rating']}&nbsp{$actor['votes']}&nbsp{$actor['avg_0_18']}&nbsp{$actor['num_0_18']}&nbsp{$actor['avg_18_30']}&nbsp{$actor['num_18_30']}&nbsp{$actor['avg_30_45']}&nbsp{$actor['num_30_45']}&nbsp{$actor['avg_45up']}&nbsp{$actor['num_45up']}";
  echo "</pre>";
  
}

 $sql='SELECT * from male where id="'.$id.'";';

  if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

// Phew, we made it. We know our MySQL connection and query 
// succeeded, but do we have a result?
if ($result->num_rows === 0) {
    // Oh, no rows! Sometimes that's expected and okay, sometimes
    // it is not. You decide. In this case, maybe actor_id was too
    // large? 
    echo "We could not find a match for ID $aid, sorry about that. Please try again.";
    exit;
}

echo '<div style="font-size:1.25em;color:red">Male </div>';


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['id']}&nbsp{$actor['rating']}&nbsp{$actor['votes']}&nbsp{$actor['avg_0_18']}&nbsp{$actor['num_0_18']}&nbsp{$actor['avg_18_30']}&nbsp{$actor['num_18_30']}&nbsp{$actor['avg_30_45']}&nbsp{$actor['num_30_45']}&nbsp{$actor['avg_45up']}&nbsp{$actor['num_45up']}";
  echo "</pre>";
  
}

 $sql='SELECT * from female where id="'.$id.'";';

  if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

// Phew, we made it. We know our MySQL connection and query 
// succeeded, but do we have a result?
if ($result->num_rows === 0) {
    // Oh, no rows! Sometimes that's expected and okay, sometimes
    // it is not. You decide. In this case, maybe actor_id was too
    // large? 
    echo "We could not find a match for ID $aid, sorry about that. Please try again.";
    exit;
}

echo '<div style="font-size:1.25em;color:red">Female </div>';


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['id']}&nbsp{$actor['rating']}&nbsp{$actor['votes']}&nbsp{$actor['avg_0_18']}&nbsp{$actor['num_0_18']}&nbsp{$actor['avg_18_30']}&nbsp{$actor['num_18_30']}&nbsp{$actor['avg_30_45']}&nbsp{$actor['num_30_45']}&nbsp{$actor['avg_45up']}&nbsp{$actor['num_45up']}";
  echo "</pre>";
  
}
    /*$sql_str="SELECT m.title, g.avg_$age ,g.num_$age FROM movie m, $gender g WHERE m.id='$id' and m.id=g.id";
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
     
    }*/
    
    $result->free();
    $mysqli->close();
?>




