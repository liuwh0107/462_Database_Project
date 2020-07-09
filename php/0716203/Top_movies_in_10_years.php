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

$sql="SELECT temp.title, temp.rating,temp.year
FROM (
SELECT movie.title, all_gender.rating, movie.year
FROM movie, all_gender
WHERE movie.id = all_gender.id
AND movie.year BETWEEN 2009 AND 2019
ORDER BY all_gender.rating DESC
LIMIT 10) as temp";



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



echo '<div style="font-size:1.25em;color:red">近10年出產的最佳電影</div>';
$title='Title';
$rating='Rating';
$year='Year';
echo '<tr><td>','#','</td>';
echo '<td>',$title,'</td>';
echo '<td>',$rating,'</td>';
echo '<td>',$year,'</td>';
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['title'],'</td>';
    echo '<td>',$actor['rating'],'</td>';
    echo '<td>',$actor['year'],'</td>';
   
  
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