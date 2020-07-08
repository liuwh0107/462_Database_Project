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

$sql="SELECT top100.title from
(SELECT m.title,ag.votes,ag.rating
from movie m,all_gender ag
where m.id=ag.id
order by ag.votes DESC limit 100)as top100
order by top100.rating desc";




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

echo '<div style="font-size:1.25em;color:red">Top 100 Popular Movie </div>';
$title=title;
echo '<tr><td>',$title,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['title'],'</td>';

}



$result->free();
$mysqli->close();
?>
</tr>
</table
