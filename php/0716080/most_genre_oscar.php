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

$sql="SELECT temp.genre, temp.cnt
from(SELECT g.genre as genre, count(*) as cnt
from genre g,
(SELECT   DISTINCT m.id as  id
FROM movie m, golden_globe o
where  m.title=o.film and o.win= 'TRUE')as temp1
where temp1.id=g.id
group by g.genre
ORDER BY count(*) DESC) as temp";


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

echo '<div style="font-size:1.25em;color:red">奧斯卡獎得獎數量最多的電影類型 </div>';
$genre=Genre;
$count='# of wins';

echo '<tr><td>','#','</td>';
echo '<td>',$genre,'</td>';
echo '<td>',$count,'</td>';
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['genre'],'</td>';
    echo '<td>',$actor['cnt'],'</td>';
    

}



$result->free();
$mysqli->close();
?>
</tr>
</table>
