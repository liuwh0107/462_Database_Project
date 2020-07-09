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

$sql="SELECT table1.year,table1.pity_film
from
(SELECT chart4.year,min(chart4.film) as pity_film
from
(SELECT chart1.year,max(chart1.cnt) as cnt
from
(SELECT o.year,o.film,count(*) as cnt
from oscar o
where win='FALSE'
and o.film not in
(SELECT temp.film
from
(SELECT o.year,o.film,o.win,count(*)
from oscar o 
where win='TRUE'
group by year,film,win
order by film)as temp)
group by year,film,win
order by year)as chart1
group by year)as chart3
,

(SELECT o.year,o.film,count(*) as cnt
from oscar o
where win='FALSE'
and o.film not in
(SELECT temp.film
from
(SELECT o.year,o.film,o.win,count(*)
from oscar o
where win='TRUE'
group by year,film,win
order by film)as temp)
group by year,film,win
order by year)as chart4
where chart3.year=chart4.year
and chart3.cnt=chart4.cnt
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

echo '<div style="font-size:1.25em;color:red">Oscar Snub  </div>';
while ($actor = $result->fetch_assoc()) {    
 
  echo "<pre>"; 
  echo "{$actor['year']}&nbsp{$actor['pity_film']}";
  echo "</pre>";
}



$result->free();
$mysqli->close();
?>

