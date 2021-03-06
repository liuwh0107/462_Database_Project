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

$sql="SELECT table1.country,table1.best_movie
from
(SELECT chart2.country,max(chart2.title) as best_movie
from
(SELECT md.country,min(ag.rating) as rating
from movie_detail md,all_gender ag
where md.id=ag.id and country!=''
group by country)as chart1,
(SELECT md.country,m.title,ag.rating
from movie_detail md, movie m,all_gender ag
where md.id=m.id and md.id=ag.id)as chart2
where chart1.country=chart2.country
and chart1.rating=chart2.rating
group by country)as table1";




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

echo '<div style="font-size:1.25em;color:red">Country Best Movie  </div>';
while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['country']}&nbsp{$actor['best_movie']}";
  echo "</pre>";
}



$result->free();
$mysqli->close();
?>

