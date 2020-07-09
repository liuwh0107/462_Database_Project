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

$sql="SELECT table1.movie,table1.rating
from
(SELECT cd.title as movie,ag.rating
from all_gender ag,
(SELECT m.id,m.title,md.duration
from movie m,movie_detail md
where md.duration<=90 and m.id=md.id)as cd/*cd(candidate) is a table with id , film_name and duration <90*/
where ag.id=cd.id
order by ag.rating DESC limit 10)as table1;";




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

echo '<div style="font-size:1.25em;color:red">Top 10 Short Movie </div>';
$movie=movie;
$rating=rating;

echo '<tr><td>',$movie,'</td>';
echo '<td>',$rating,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['movie'],'</td>';
    echo '<td>',$actor['rating'],'</td>';

}



$result->free();
$mysqli->close();
?>
</tr>
</table>
