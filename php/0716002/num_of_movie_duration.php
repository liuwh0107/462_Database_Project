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

$sql="SELECT table1.duration,table1.number_of_movie
from
(SELECT '< 90 minutes' as duration,count(temp.duration) as number_of_movie
from
(SELECT duration from movie_detail
where duration<90)as temp
union
SELECT '90~150 minutes' as duration,count(temp.duration) as number_of_movie
from
(SELECT duration from movie_detail
where duration between 90 and 150)as temp
union
SELECT '> 150 minutes' as duration,count(temp.duration) as number_of_movie
from
(SELECT duration from movie_detail
where duration>150)as temp)as table1";




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

echo '<div style="font-size:1.25em;color:red">各片長區間的電影數量</div>';
$duration=Duration;
$number_of_movie='# of Movies';

echo '<tr><td>','#','</td>';
echo '<td>',$duration,'</td>';
echo '<td>',$number_of_movie,'</td>';
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['duration'],'</td>';
    echo '<td>',$actor['number_of_movie'],'</td>';
 
}



$result->free();
$mysqli->close();
?>
</tr>
</table>

