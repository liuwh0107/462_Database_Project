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

$sql="SELECT table1.duration,table1.number_of_movie
from
(SELECT '<= 90' as duration,count(temp.duration) as number_of_movie
from
(SELECT duration from movie_detail
where duration<=90)as temp
union
SELECT '91~150' as duration,count(temp.duration) as number_of_movie
from
(SELECT duration from movie_detail
where duration between 91 and 150)as temp
union
SELECT '> 150' as duration,count(temp.duration) as number_of_movie
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

echo '<div style="font-size:1.25em;color:red">Amount of Movies in Different Duration Interval </div>';
$duration=duration;
$number_of_movie=number_of_movie;

echo '<tr><td>',$duration,'</td>';
echo '<td>',$number_of_movie,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['duration'],'</td>';
    echo '<td>',$actor['number_of_movie'],'</td>';
 
}



$result->free();
$mysqli->close();
?>
</tr>
</table>

