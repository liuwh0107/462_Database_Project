
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

$sql="SELECT temp.country, temp.cnt
FROM (
SELECT movie_detail.country, COUNT(*) as cnt
FROM movie_detail
GROUP BY movie_detail.country
ORDER BY  COUNT(*) DESC) as temp";



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

echo '<div style="font-size:1.25em;color:red">Most movie of each country</div>';

$country=country;
$count=count;

echo '<tr><td>',$country,'</td>';
echo '<td>',$count,'</td>';
while ($actor = $result->fetch_assoc()) {    
 
  echo '<tr><td>',$actor['country'],'</td>';
  echo '<td>',$actor['cnt'],'</td>';
  
}



$result->free();
$mysqli->close();
?>
</tr>
</table>
