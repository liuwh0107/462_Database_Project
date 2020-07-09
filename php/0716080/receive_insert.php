
<?php
   $mysqli = new mysqli('localhost', 'root', 'password', 'test');

// Oh no! A connect_errno exists so the connection attempt failed!
    if ($mysqli->connect_errno) {
        echo "Sorry, this website is experiencing problems.";

        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
    
        exit;
}

    $country=$_POST['country'] ;
    $genre= $_POST['genre'];
    $rating = $_POST['rating'];
    $title= $_POST['title'];
    $duration= $_POST['duration'];
    $gender= $_POST['gender'];
    $director = $_POST['director'];
    $age= $_POST['age'];
    $year= $_POST['year'];
    
    $sql='SELECT movie.id from movie;';
    $num_row=$mysqli->query($sql)->num_rows;
    echo "rows:".$num_row;
    $id="new".$num_row;
    echo "ID:".$id;
    //error handling
    
    $sql='INSERT INTO movie (id,title,year) values ("'.$id.'","'.$title.'","'.$year.'")';
    echo $sql;
   
 if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}
    echo "---------------------";
$sql='INSERT INTO movie_detail (id,duration,country) values ("'.$id.'","'.$duration.'","'.$country.'")';
    echo $sql;
   
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
    
 echo "---------------------";
$sql='INSERT INTO genre (id,genre) values ("'.$id.'","'.$genre.'")';
    echo $sql;
   
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

echo "---------------------";
$sql='INSERT INTO director (id,director) values ("'.$id.'","'.$director.'")';
    echo $sql;

   
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

echo "---------------------";
$sql='INSERT INTO all_gender (id,rating,votes,avg_0_18,num_0_18,avg_18_30,num_18_30,avg_30_45,num_30_45,avg_45up,num_45up) values ("'.$id.'",0,0,0,0,0,0,0,0,0,0)';
    echo $sql;

   
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

echo "---------------------";
$sql='INSERT INTO male (id,rating,votes,avg_0_18,num_0_18,avg_18_30,num_18_30,avg_30_45,num_30_45,avg_45up,num_45up) values ("'.$id.'",0,0,0,0,0,0,0,0,0,0)';
    echo $sql;

   
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

echo "---------------------";
$sql='INSERT INTO female (id,rating,votes,avg_0_18,num_0_18,avg_18_30,num_18_30,avg_30_45,num_30_45,avg_45up,num_45up) values ("'.$id.'",0,0,0,0,0,0,0,0,0,0)';
    echo $sql;

   
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

echo "---------------------";
if($age<18)
{
    $column_avg='avg_0_18';
    $column_vote='num_0_18';
}
else if($age<30)
{
    $column_avg='avg_18_30';
    $column_vote='num_18_30';
}
else if($age<45)
{
    $column_avg='avg_30_45';
    $column_vote='num_30_45';
}
else 
{
    $column_avg='avg_45up';
    $column_vote='num_45up';
}
echo "~~~~~~~";
echo "column_avg:".$column_avg."\n";
echo "column_vote:".$column_vote."\n";
echo "~~~~~~~";
$sql='UPDATE all_gender SET rating='.$rating.',votes=1,'.$column_avg.'='.$rating.','.$column_vote.'=1 where all_gender.id="'.$id.'";';
echo $sql;


   
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


$sql='UPDATE '.$gender.' SET rating='.$rating.',votes=1,'.$column_avg.'='.$rating.','.$column_vote.'=1 where '.$gender.'.id="'.$id.'";';
echo $sql;


   
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


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['id']}&nbsp{$actor['title']}";
  echo "</pre>";
  
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


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['id']}&nbsp{$actor['duration']}&nbsp{$actor['country']}";
  echo "</pre>";
  
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


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['id']}&nbsp{$actor['director']}";
  echo "</pre>";
  
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


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['id']}&nbsp{$actor['genre']}";
  echo "</pre>";
  
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
$result->free();
$mysqli->close();


?>



