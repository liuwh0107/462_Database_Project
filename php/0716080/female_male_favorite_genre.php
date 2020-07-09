<table border="1">
<tr>
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

// Perform an SQL query
echo '<div style="font-size:1.25em;color:red">女性各年齡層評分最高的電影類型</div>';

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

$string1=Age;
$string2=Genre;
$string3=Rating;
echo '<tr><td>',$string1,'</td>';
echo '<td>',$string2,'</td>';
echo '<td>',$string3,'</td>';
while ($actor = $result->fetch_assoc()) {    
 
    $string='0~18';
    echo '<tr><td>',$string,'</td>';
    echo '<td>',$actor['genre'],'</td>';
    echo '<td>',$actor['rate'],'</td>';
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
 
    $string='18~30';
    echo '<tr><td>',$string,'</td>';
    echo '<td>',$actor['genre'],'</td>';
    echo '<td>',$actor['rate'],'</td>';
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
 
    $string='30~45';
    echo '<tr><td>',$string,'</td>';
    echo '<td>',$actor['genre'],'</td>';
    echo '<td>',$actor['rate'],'</td>';
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
 
    $string='45+';
    echo '<tr><td>',$string,'</td>';
    echo '<td>',$actor['genre'],'</td>';
    echo '<td>',$actor['rate'],'</td>';
}

$result->free();
$mysqli->close();
?>
</tr>
</table>
<table border="1">
<tr>
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

// Perform an SQL query

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

echo '<div style="font-size:1.25em;color:red">男性各年齡層評分最高的電影類型</div>';

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
$string1=Age;
$string2=Genre;
$string3=Rating;
echo '<tr><td>',$string1,'</td>';
echo '<td>',$string2,'</td>';
echo '<td>',$string3,'</td>';
while ($actor = $result->fetch_assoc()) {    
 
    $string='0~18';
    echo '<tr><td>',$string,'</td>';
    echo '<td>',$actor['genre'],'</td>';
    echo '<td>',$actor['rate'],'</td>';
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
 
    $string='18~30';
    echo '<tr><td>',$string,'</td>';
    echo '<td>',$actor['genre'],'</td>';
    echo '<td>',$actor['rate'],'</td>';
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
 
    $string='30~45';
    echo '<tr><td>',$string,'</td>';
    echo '<td>',$actor['genre'],'</td>';
    echo '<td>',$actor['rate'],'</td>';
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
   $string='45+';
    echo '<tr><td>',$string,'</td>';
    echo '<td>',$actor['genre'],'</td>';
    echo '<td>',$actor['rate'],'</td>';
}

$result->free();
$mysqli->close();
?>
</tr>
</table>
