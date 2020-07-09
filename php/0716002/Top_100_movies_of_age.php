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
echo '<div style="font-size:1.25em;color:red">0~18歲評分Top 100</div>';

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

$title=Title;
$rate=Rating;

echo '<tr><td>','#','</td>';
echo '<td>',$title,'</td>';
echo '<td>',$rate,'</td>';
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['title'],'</td>';
    echo '<td>',$actor['avg_0_18'],'</td>';
  
}
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

echo '<div style="font-size:1.25em;color:red">18~30歲評分Top 100</div>';
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
$title=Title;
$rate=Rating;

echo '<tr><td>','#','</td>';
echo '<td>',$title,'</td>';
echo '<td>',$rate,'</td>';

$rowid = 0;
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['title'],'</td>';
    echo '<td>',$actor['avg_18_30'],'</td>';
  
}
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
echo '<div style="font-size:1.25em;color:red">30~45歲評分Top 100</div>';
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

$title=Title;
$rate=Rating;

echo '<tr><td>','#','</td>';
echo '<td>',$title,'</td>';
echo '<td>',$rate,'</td>';
$rowid = 0;
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['title'],'</td>';
    echo '<td>',$actor['avg_30_45'],'</td>';
}
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
echo '<div style="font-size:1.25em;color:red">45歲以上評分Top 100</div>';
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
$title=Title;
$rate=Rating;

echo '<tr><td>','#','</td>';
echo '<td>',$title,'</td>';
echo '<td>',$rate,'</td>';
$rowid = 0;
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['title'],'</td>';
    echo '<td>',$actor['avg_45up'],'</td>';
  
}

$result->free();
$mysqli->close();
?>
</tr>
</table>
