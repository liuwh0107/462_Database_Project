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

$sql="SELECT * from
(SELECT gen.genre,count(*)as cnt
from genre gen,
(SELECT m.title,m.id 
from movie m,
(SELECT chart1.year,chart1.film,count(*) as cnt from
(SELECT g.year,g.film,g.win from golden_globe g
where g.win='TRUE')as chart1
group by chart1.year,chart1.film)as chart2
where m.title=chart2.film)as chart3
where gen.id=chart3.id
group by gen.genre)as table1
order by table1.cnt DESC limit 3;";




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

echo '<div style="font-size:1.25em;color:red">金球獎得獎數量最多的電影類型 </div>';
$genre=Genre;
$count='# of wins';

echo '<tr><td>','#','</td>';
echo '<td>',$genre,'</td>';
echo '<td>',$count,'</td>';
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['genre'],'</td>';
    echo '<td>',$actor['cnt'],'</td>';
    

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