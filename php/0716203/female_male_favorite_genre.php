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
echo '<div style="font-size:1.25em;color:red">Female</div>';

$sql="SELECT temp.genre, temp.rate
from(SELECT g.genre as genre ,avg(f.avg_0_18) as rate
from female f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_0_18) DESC limit 1) as temp";


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
  echo "0-18: ";
  echo "{$actor['genre']}&nbsp{$actor['rate']}";
  echo "</pre>";
}

$sql="SELECT temp.genre, temp.rate
from(SELECT g.genre as genre ,avg(f.avg_18_30) as rate
from female f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_18_30) DESC limit 1) as temp";


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
  echo "18-30: ";
  echo "{$actor['genre']}&nbsp{$actor['rate']}";
  echo "</pre>";
}

$sql="SELECT temp.genre, temp.rate
from(SELECT g.genre as genre ,avg(f.avg_30_45) as rate
from female f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_30_45) DESC limit 1) as temp";


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
  echo "30-45: ";
  echo "{$actor['genre']}&nbsp{$actor['rate']}";
  echo "</pre>";
}

$sql="SELECT temp.genre, temp.rate
from(SELECT g.genre as genre ,avg(f.avg_45up) as rate
from female f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_45up) DESC limit 1) as temp";


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
  echo "45+: ";
  echo "{$actor['genre']}&nbsp{$actor['rate']}";
  echo "</pre>";
}

echo '<div style="font-size:1.25em;color:red">Male</div>';

$sql="SELECT temp.genre, temp.rate
from(SELECT g.genre as genre ,avg(f.avg_0_18) as rate
from male f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_0_18) DESC limit 1) as temp";


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
  echo "0-18: ";
  echo "{$actor['genre']}&nbsp{$actor['rate']}";
  echo "</pre>";
}

$sql="SELECT temp.genre, temp.rate
from(SELECT g.genre as genre ,avg(f.avg_18_30) as rate
from male f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_18_30) DESC limit 1) as temp";


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
  echo "18-30: ";
  echo "{$actor['genre']}&nbsp{$actor['rate']}";
  echo "</pre>";
}

$sql="SELECT temp.genre, temp.rate
from(SELECT g.genre as genre ,avg(f.avg_30_45) as rate
from male f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_30_45) DESC limit 1) as temp";


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
  echo "30-45: ";
  echo "{$actor['genre']}&nbsp{$actor['rate']}";
  echo "</pre>";
}

$sql="SELECT temp.genre, temp.rate
from(SELECT g.genre as genre ,avg(f.avg_45up) as rate
from male f, genre g
where f.id=g.id
GROUP BY g.genre
ORDER BY avg(f.avg_45up) DESC limit 1) as temp";


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
  echo "45+: ";
  echo "{$actor['genre']}&nbsp{$actor['rate']}";
  echo "</pre>";
}

$result->free();
$mysqli->close();
?>

