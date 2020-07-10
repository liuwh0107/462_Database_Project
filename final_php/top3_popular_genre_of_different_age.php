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

// Perform an SQL query

$sql="SELECT table1.genre,table1.avg_rating_0_18
from
(SELECT chart1.genre,avg(chart1.num_0_18) as avg_rating_0_18
from
(SELECT ag.num_0_18,g.genre from all_gender ag,genre g
where ag.id=g.id)as chart1
group by chart1.genre
order by avg_rating_0_18 desc limit 3)as table1;";




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

echo '<div style="font-size:1.25em;color:red">TOP 3 Favorite Genre (0~18) </div>';

$genre='genre';
$avg_rating_0_18='avg_num_0_18';

echo '<tr><td>',$genre,'</td>';
echo '<td>',$avg_rating_0_18,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['genre'],'</td>';
    echo '<td>',$actor['avg_rating_0_18'],'</td>';

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
$sql="SELECT table1.genre,table1.avg_rating_18_30
from
(SELECT chart1.genre,avg(chart1.num_18_30) as avg_rating_18_30
from
(SELECT ag.num_18_30,g.genre from all_gender ag,genre g
where ag.id=g.id)as chart1
group by chart1.genre
order by avg_rating_18_30 desc limit 3)as table1;";




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

echo '<div style="font-size:1.25em;color:red">TOP 3 Favorite Genre (18~30) </div>';
$genre='genre';
$avg_rating_18_30='avg_num_18_30';

echo '<tr><td>',$genre,'</td>';
echo '<td>',$avg_rating_18_30,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['genre'],'</td>';
    echo '<td>',$actor['avg_rating_18_30'],'</td>';
  
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

$sql="SELECT table1.genre,table1.avg_rating_30_45
from
(SELECT chart1.genre,avg(chart1.num_30_45) as avg_rating_30_45
from
(SELECT ag.num_30_45,g.genre from all_gender ag,genre g
where ag.id=g.id)as chart1
group by chart1.genre
order by avg_rating_30_45 desc limit 3)as table1;";




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

echo '<div style="font-size:1.25em;color:red">TOP 3 Favorite Genre (30~45) </div>';
$genre='genre';
$avg_rating_30_45='avg_num_30_45';

echo '<tr><td>',$genre,'</td>';
echo '<td>',$avg_rating_30_45,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['genre'],'</td>';
    echo '<td>',$actor['avg_rating_30_45'],'</td>';
  
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

$sql="SELECT table1.genre,table1.avg_rating_45up
from
(SELECT chart1.genre,avg(chart1.num_45up) as avg_rating_45up
from
(SELECT ag.num_45up,g.genre from all_gender ag,genre g
where ag.id=g.id)as chart1
group by chart1.genre
order by avg_rating_45up desc limit 3)as table1;";




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

echo '<div style="font-size:1.25em;color:red">TOP 3 Favorite Genre (45up) </div>';
$genre='genre';
$avg_rating_45up='avg_num_45up';

echo '<tr><td>',$genre,'</td>';
echo '<td>',$avg_rating_45up,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['genre'],'</td>';
    echo '<td>',$actor['avg_rating_45up'],'</td>';

}




$result->free();
$mysqli->close();
?>
</tr>
</table>
<form action="query.php" method="post">
<input type="submit" value='查看其他統計資料''>
</form>

<form action="info.php" method="post">
<input type="submit" value='回到主畫面'>
</form>