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

$sql="SELECT mo.title,ids.rating
FROM movie mo,
(SELECT f.id,(f.rating+m.rating)/2 as rating
FROM female f, male m
where f.id=m.id and f.rating>9 and m.rating>9
ORDER BY f.rating+m.rating DESC limit 10)as ids
where mo.id=ids.id";




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

echo '<div style="font-size:1.25em;color:red">Both  sex  rating>9  TOP10 </div>';
$title=title;
$rating=rating;

echo '<tr><td>',$title,'</td>';
echo '<td>',$rating,'</td>';
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$actor['title'],'</td>';
    echo '<td>',$actor['rating'],'</td>';

}



$result->free();
$mysqli->close();
?>
</tr>
</table>


<form action="query.php" method="post">
<input type="submit" value='查看其他統計資料''>
</form>

<form action="info.php" method="post">
<input type="submit" value='回到主畫面'>
</form>