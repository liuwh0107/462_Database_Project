<table border="1">
<tr>
<?php
 $mysqli = new mysqli('localhost', 'root', '', 'project');
$id=$_POST['id1'] ;



//print the inserted row of all table
    $sql='SELECT * from movie where id="'.$id.'";';

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

echo '<div style="font-size:1.25em;color:red">Movie </div>';

$id=id;
$title=title;
$year =year;
echo '<tr><td>',$id,'</td>';
echo '<td>',$title,'</td>';
echo '<td>',$year,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['id'],'</td>';
    echo '<td>',$actor['title'],'</td>';
    echo '<td>',$actor['year'],'</td>';
  
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
$id=$_POST['id2'] ;
// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
     exit;
}
$sql='SELECT * from movie_detail where id="'.$id.'";';
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

echo '<div style="font-size:1.25em;color:red">Movie_Detail </div>';
$id=id;
$duration=duration;
$country=country;
echo '<tr><td>',$id,'</td>';
echo '<td>',$duration,'</td>';
echo '<td>',$country,'</td>';

while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['id'],'</td>';
    echo '<td>',$actor['duration'],'</td>';
    echo '<td>',$actor['country'],'</td>';
  
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
$id=$_POST['id3'] ;
// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
     exit;
}

    $sql='SELECT * from director where id="'.$id.'";';

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

echo '<div style="font-size:1.25em;color:red">Director </div>';

$id=id;
$director=director;
echo '<tr><td>',$id,'</td>';
echo '<td>',$director,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['id'],'</td>';
    echo '<td>',$actor['director'],'</td>';
  
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
$id=$_POST['id4'] ;
// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
     exit;
}
    $sql='SELECT * from genre where id="'.$id.'";';

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

echo '<div style="font-size:1.25em;color:red">Genre </div>';

$id=id;
$genre=genre;
echo '<tr><td>',$id,'</td>';
echo '<td>',$genre,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['id'],'</td>';
    echo '<td>',$actor['genre'],'</td>';
  
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
$id=$_POST['id5'] ;
// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
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

$id=id;
$rating=rating;
$votes=votes;
$avg_0_18=avg_0_18;
$num_0_18=num_0_18;
$avg_18_30=avg_18_30;
$num_18_30=num_18_30;
$avg_30_45=avg_30_45;
$num_30_45=num_30_45;
$avg_45up=avg_45up;
$num_45up=num_45up;
echo '<tr><td>',$id,'</td>';
echo '<td>',$rating,'</td>';
echo '<td>',$votes,'</td>';
echo '<td>',$avg_0_18,'</td>';
echo '<td>',$num_0_18,'</td>';
echo '<td>',$avg_18_30,'</td>';
echo '<td>',$num_18_30,'</td>';
echo '<td>',$avg_30_45,'</td>';
echo '<td>',$num_30_45,'</td>';
echo '<td>',$avg_45up,'</td>';
echo '<td>',$num_45up,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['id'],'</td>';
    echo '<td>',$actor['rating'],'</td>';
    echo '<td>',$actor['votes'],'</td>';
    echo '<td>',$actor['avg_0_18'],'</td>';
    echo '<td>',$actor['num_0_18'],'</td>';
    echo '<td>',$actor['avg_18_30'],'</td>';
    echo '<td>',$actor['num_18_30'],'</td>';
    echo '<td>',$actor['avg_30_45'],'</td>';
    echo '<td>',$actor['num_30_45'],'</td>';
    echo '<td>',$actor['avg_45up'],'</td>';
    echo '<td>',$actor['num_45up'],'</td>';
  
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
$id=$_POST['id6'] ;
// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
     exit;
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

$id=id;
$rating=rating;
$votes=votes;
$avg_0_18=avg_0_18;
$num_0_18=num_0_18;
$avg_18_30=avg_18_30;
$num_18_30=num_18_30;
$avg_30_45=avg_30_45;
$num_30_45=num_30_45;
$avg_45up=avg_45up;
$num_45up=num_45up;
echo '<tr><td>',$id,'</td>';
echo '<td>',$rating,'</td>';
echo '<td>',$votes,'</td>';
echo '<td>',$avg_0_18,'</td>';
echo '<td>',$num_0_18,'</td>';
echo '<td>',$avg_18_30,'</td>';
echo '<td>',$num_18_30,'</td>';
echo '<td>',$avg_30_45,'</td>';
echo '<td>',$num_30_45,'</td>';
echo '<td>',$avg_45up,'</td>';
echo '<td>',$num_45up,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['id'],'</td>';
    echo '<td>',$actor['rating'],'</td>';
    echo '<td>',$actor['votes'],'</td>';
    echo '<td>',$actor['avg_0_18'],'</td>';
    echo '<td>',$actor['num_0_18'],'</td>';
    echo '<td>',$actor['avg_18_30'],'</td>';
    echo '<td>',$actor['num_18_30'],'</td>';
    echo '<td>',$actor['avg_30_45'],'</td>';
    echo '<td>',$actor['num_30_45'],'</td>';
    echo '<td>',$actor['avg_45up'],'</td>';
    echo '<td>',$actor['num_45up'],'</td>';
 
  
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
$id=$_POST['id7'] ;
// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
     exit;
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

$id=id;
$rating=rating;
$votes=votes;
$avg_0_18=avg_0_18;
$num_0_18=num_0_18;
$avg_18_30=avg_18_30;
$num_18_30=num_18_30;
$avg_30_45=avg_30_45;
$num_30_45=num_30_45;
$avg_45up=avg_45up;
$num_45up=num_45up;
echo '<tr><td>',$id,'</td>';
echo '<td>',$rating,'</td>';
echo '<td>',$votes,'</td>';
echo '<td>',$avg_0_18,'</td>';
echo '<td>',$num_0_18,'</td>';
echo '<td>',$avg_18_30,'</td>';
echo '<td>',$num_18_30,'</td>';
echo '<td>',$avg_30_45,'</td>';
echo '<td>',$num_30_45,'</td>';
echo '<td>',$avg_45up,'</td>';
echo '<td>',$num_45up,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['id'],'</td>';
    echo '<td>',$actor['rating'],'</td>';
    echo '<td>',$actor['votes'],'</td>';
    echo '<td>',$actor['avg_0_18'],'</td>';
    echo '<td>',$actor['num_0_18'],'</td>';
    echo '<td>',$actor['avg_18_30'],'</td>';
    echo '<td>',$actor['num_18_30'],'</td>';
    echo '<td>',$actor['avg_30_45'],'</td>';
    echo '<td>',$actor['num_30_45'],'</td>';
    echo '<td>',$actor['avg_45up'],'</td>';
    echo '<td>',$actor['num_45up'],'</td>';
 
  
}
$result->free();
$mysqli->close();
?>
</tr>
</table>
<form action="rate.php" method="post">
<input type='submit'  value='重新評分'>
</form>
<form action="info.php" method="post">
<input type='submit'  value='回到主畫面'>
</form>


