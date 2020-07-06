<?php
$mysqli = new mysqli('localhost', 'root', 'office209', 'project');

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
    SELECT oscar.year, oscar.film, COUNT(*) as num_of_wins
    FROM  oscar
    WHERE win = 'TRUE'
    GROUP BY oscar.year, oscar.film
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

echo '<div style="font-size:1.25em;color:red">Winner </div>';
while ($actor = $result->fetch_assoc()) {    
  //echo "<pre>";
  //echo "{$actor['id']} &nbsp {$actor['rating']}\n";
  //echo "</pre>";
  echo "<pre>";
 
  
  echo "{$actor['year']}&nbsp{$actor['film']}&nbsp{$actor['wins']}";
  echo "</pre>";
}



$result->free();
$mysqli->close();
?>

