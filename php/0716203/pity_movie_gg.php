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

$sql="SELECT table1.year,table1.snub,table1.num_nominate
from
(SELECT chart4.year,min(chart4.film) as snub,chart4.cnt as num_nominate
from
(SELECT chart1.year,max(chart1.cnt) as cnt
from
(SELECT g.year,g.film,count(*) as cnt
from golden_globe g 
where win='FALSE'
and g.film not in
(SELECT temp.film
from
(SELECT g.year,g.film,g.win,count(*)
from golden_globe g 
where win='TRUE'
group by year,film,win
order by film)as temp)
group by year,film,win
order by year)as chart1
group by year)as chart3
,

(SELECT g.year,g.film,count(*) as cnt
from golden_globe g 
where win='FALSE'
and g.film not in
(SELECT temp.film
from
(SELECT g.year,g.film,g.win,count(*)
from golden_globe g 
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

echo '<div style="font-size:1.25em;color:red">金球獎最大遺珠 (每年沒得獎的電影中被提名次數最多的電影)</div>';
$year=Year;
$snub=Title;
$num_nominate='# of Nominations';
echo '<tr><td>','#','</td>';
echo '<td>',$year,'</td>';
echo '<td>',$snub,'</td>';
echo '<td>',$num_nominate,'</td>';
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['year'],'</td>';
    echo '<td>',$actor['snub'],'</td>';
    echo '<td>',$actor['num_nominate'],'</td>';
  
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