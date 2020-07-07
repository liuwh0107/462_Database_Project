<?php
$mysqli = new mysqli('localhost', 'root', '301850', 'project');

// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
     exit;
}

// Perform an SQL query

$sql="SELECT table1.duration,table1.average_rating from
(SELECT '<= 90' as duration,avg(temp.rating) as average_rating
from
(SELECT md.duration,ag.rating 
from movie_detail md,all_gender ag
where md.id=ag.id and duration<=90)as temp
union
SELECT '91~150' as duration,avg(temp.rating) as average_rating
from
(SELECT md.duration,ag.rating 
from movie_detail md,all_gender ag
where md.id=ag.id and duration between 91 and 150)as temp
union
SELECT '> 150' as duration,avg(temp.rating) as average_rating
from
(SELECT md.duration,ag.rating 
from movie_detail md,all_gender ag
where md.id=ag.id and duration>150)as temp
order by average_rating desc)as table1 limit 3";




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

echo '<div style="font-size:1.25em;color:red">Duration Ranking </div>';
while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['duration']}&nbsp{$actor['average_rating']}";
  echo "</pre>";
}



$result->free();
$mysqli->close();
?>

