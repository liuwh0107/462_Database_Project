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

$sql="SELECT table1.director,table1.career_years from 
(SELECT chart1.director,(chart1.year-chart2.year) as career_years
from
(SELECT d.director,max(m.year) as year
from director d,movie m
where m.id=d.id
group by director
order by director)as chart1,

(SELECT d.director,min(m.year) as year
from director d,movie m
where m.id=d.id
group by director
order by director)as chart2
where chart1.director=chart2.director)as table1
where table1.career_years<50
order by career_years desc limit 5";




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

echo '<div style="font-size:1.25em;color:red">Director with longest career TOP 3 </div>';
while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['director']}&nbsp{$actor['career_years']}";
  echo "</pre>";
}



$result->free();
$mysqli->close();
?>

