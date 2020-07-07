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

$sql="SELECT temp.genre, temp.rate
from(SELECT g.genre, AVG(al.rating) as rate
FROM genre g, all_gender al
where g.id=al.id
GROUP BY g.genre
ORDER BY AVG(al.rating) DESC limit 3) as temp";




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

echo '<div style="font-size:1.25em;color:red"> TOP3  rating genere</div>';
$genre=genre;
$rate=rate;

echo '<tr><td>',$genre,'</td>';
echo '<td>',$rate,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['genre'],'</td>';
    echo '<td>',$actor['rate'],'</td>';

}



$result->free();
$mysqli->close();
?>
</tr>
</table>
