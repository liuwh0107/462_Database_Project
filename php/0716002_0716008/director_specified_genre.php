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

$sql="SELECT temp.director,temp.genre_specified,temp.genre_avg_rating
from
(SELECT chart2.director,min(chart3.genre)as genre_specified,chart2.avg_rating as genre_avg_rating from
(SELECT chart1.director,max(chart1.avg_rating)as avg_rating
from
(SELECT d.director,g.genre,avg(ag.rating) as avg_rating
from director d,genre g,all_gender ag
where ag.id=g.id and d.id=ag.id
and d.director not in
(SELECT chart1.director
from
(SELECT d.director,count(*) as cnt from director d
group by d.director
order by cnt)as chart1
where chart1.cnt<=30)
group by d.director,g.genre
)as chart1
group by chart1.director
order by chart1.director)as chart2,

(SELECT d.director,g.genre,avg(ag.rating) as avg_rating
from director d,genre g,all_gender ag
where ag.id=g.id and d.id=ag.id
and d.director not in
(SELECT chart1.director
from
(SELECT d.director,count(*) as cnt from director d
group by d.director
order by cnt)as chart1
where chart1.cnt<=30)
group by d.director,g.genre)as chart3
where chart2.director=chart3.director
and chart2.avg_rating=chart3.avg_rating
group by director
order by director)as temp;";




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

echo '<div style="font-size:1.25em;color:red">各導演最擅長的電影類型(作品數量>30) </div>';
$director=Director;
$genre_specified=Genre;
$genre_avg_rating='Average Rating of That Genre';
echo '<tr><td>','#','</td>';
echo '<td>',$director,'</td>';
echo '<td>',$genre_specified,'</td>';
echo '<td>',$genre_avg_rating,'</td>';
while ($actor = $result->fetch_assoc()) {    
    $rowid = $rowid + 1;
    echo '<tr><td>',$rowid,'</td>';
    echo '<td>',$actor['director'],'</td>';
    echo '<td>',$actor['genre_specified'],'</td>';
    echo '<td>',$actor['genre_avg_rating'],'</td>';
 
}



$result->free();
$mysqli->close();
?>
</tr>
</table>
