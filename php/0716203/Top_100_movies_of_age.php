<?php
$mysqli = new mysqli('localhost', 'root', 'office209', 'project');

// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
     exit;
}

// Perform an SQL query
echo '<div style="font-size:1.25em;color:red">Top 100 movies of age from 0 to 18</div>';

$sql="SELECT movie.title, all_gender.avg_0_18
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_0_18 DESC
LIMIT 100";


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


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['title']}&nbsp{$actor['avg_0_18']}";
  echo "</pre>";
}

echo '<div style="font-size:1.25em;color:red">Top 100 movies of age from 18 to 30</div>';
$sql="SELECT movie.title, all_gender.avg_18_30
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_18_30 DESC
LIMIT 100";


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


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['title']}&nbsp{$actor['avg_18_30']}";
  echo "</pre>";
}

echo '<div style="font-size:1.25em;color:red">Top 100 movies of age from 30 to 45</div>';
$sql="SELECT movie.title, all_gender.avg_30_45
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_30_45 DESC
LIMIT 100";


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


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['title']}&nbsp{$actor['avg_30_45']}";
  echo "</pre>";
}

echo '<div style="font-size:1.25em;color:red">Top 100 movies of age more than 45</div>';
$sql="SELECT movie.title, all_gender.avg_45up
FROM movie, all_gender
WHERE movie.id = all_gender.id
ORDER BY all_gender.avg_45up DESC
LIMIT 100";


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


while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['title']}&nbsp{$actor['avg_45up']}";
  echo "</pre>";
}

$result->free();
$mysqli->close();
?>

