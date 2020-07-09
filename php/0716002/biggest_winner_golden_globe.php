<table border="1">
<tr>
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

$sql="SELECT temp.year, temp.film, temp.wins
FROM (
SELECT info.year, ANY_VALUE(info.film) as film, ANY_VALUE(info.num_of_wins) as wins
FROM(
    SELECT golden_globe.year, golden_globe.film, COUNT(*) as num_of_wins
    FROM  golden_globe
    WHERE win = 'TRUE'
    GROUP BY golden_globe.year, golden_globe.film
    ORDER BY  num_of_wins DESC) as info
GROUP BY info.year) as temp";



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

echo '<div style="font-size:1.25em;color:red">各年金球獎最大贏家 </div>';
$year=Year;
$film=Film;
$wins='# of Awards';
echo '<tr><td>','#','</td>';
echo '<td>',$year,'</td>';
echo '<td>',$film,'</td>';
echo '<td>',$wins,'</td>';
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
  echo '<td>',$actor['year'],'</td>';
  echo '<td>',$actor['film'],'</td>';
  echo '<td>',$actor['wins'],'</td>';

}



$result->free();
$mysqli->close();
?>
</tr>
</table>
