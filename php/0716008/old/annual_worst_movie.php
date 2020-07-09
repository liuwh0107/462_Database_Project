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

$sql="SELECT table1.year,table1.worst_movie
from
(SELECT chart3.year,max(chart3.title) as worst_movie
from
(SELECT chart.year,min(chart.rating) as rating
from
(SELECT m.title,m.year,ag.id,ag.rating
from movie m,all_gender ag
where m.id=ag.id)as chart
group by chart.year)as chart2,
(SELECT m.title,m.year,ag.rating
from movie m,all_gender ag
where m.id=ag.id)as chart3
where chart2.year=chart3.year
and chart2.rating=chart3.rating
group by year
order by year)as table1";




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

echo '<div style="font-size:1.25em;color:red">Annual Worst Movie </div>';
while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['year']}&nbsp{$actor['worst_movie']}";
  echo "</pre>";
}



$result->free();
$mysqli->close();
?>

