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

$sql="SELECT temp.director, temp.cnt
from(SELECT os.director as director, os.cnt+gl.cnt as cnt
FROM
(SELECT DISTINCT d.director,count(*)as cnt
from movie m, oscar o,director d
where m.title=o.film and o.win='TRUE' and d.id=m.id
GROUP BY d.director)as os,
(SELECT DISTINCT d.director,count(*)as cnt
from movie m, oscar o,director d
where m.title=o.film and o.win='TRUE' and d.id=m.id
GROUP BY d.director)as gl
WHERE os.director=gl.director
ORDER BY os.cnt+gl.cnt DESC  LIMIT 3) as temp";




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

echo '<div style="font-size:1.25em;color:red">得過最多獎項的導演</div>';
$director=Director;
$count='# of wins';

echo '<tr><td>','#','</td>';
echo '<td>',$director,'</td>';
echo '<td>',$count,'</td>';
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['director'],'</td>';
    echo '<td>',$actor['cnt'],'</td>';
    
}



$result->free();
$mysqli->close();
?>
</tr>
</table>
