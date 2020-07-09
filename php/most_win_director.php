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

$sql="SELECT * from
(SELECT table1.director,(table1.cnt+table2.cnt) as cnt from
(SELECT d.director,count(*) as cnt from director d,
(SELECT m.id,m.title from movie m,
(SELECT g.film,g.year from golden_globe g where g.win='TRUE' and g.nomination='Best Director - Motion Picture')as chart1
where m.title=chart1.film and chart1.year=m.year)as chart2
where chart2.id=d.id
group by director)as table1,

(SELECT d.director,count(*) as cnt from director d,
(SELECT m.id,m.title from movie m,
(SELECT o.film,o.year from oscar o where o.win='TRUE' and o.nomination='DIRECTING' )as chart1
where m.title=chart1.film and chart1.year=m.year)as chart2
where chart2.id=d.id
group by director)as table2
where table1.director=table2.director)as temp
order by temp.cnt desc limit 5;";




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

echo '<div style="font-size:1.25em;color:red">得過最多獎項的導演</div>';
$director=Director;
$count='# of Awards';

echo '<tr><td>','#','</td>';
echo '<td>',$director,'</td>';
echo '<td>',$count,'</td>';
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['director'],'</td>';
    echo '<td>',$actor['cnt'],'</td>';
    
}



$result->free();
$mysqli->close();
?>
</tr>
</table>
