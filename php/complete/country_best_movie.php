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

$sql="SELECT table1.country,table1.best_movie,table1.rating
from
(SELECT chart2.country,max(chart2.title) as best_movie,chart2.rating
from
(SELECT md.country,max(ag.rating) as rating
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
$country=country;
$best_movie=best_movie;
$rating=rating;
echo '<tr><td>',$country,'</td>';
echo '<td>',$best_movie,'</td>';
echo '<td>',$rating,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['country'],'</td>';
    echo '<td>',$actor['best_movie'],'</td>';
    echo '<td>',$actor['rating'],'</td>';
 
}

$result->free();
$mysqli->close();
?>
</tr>
</table>

