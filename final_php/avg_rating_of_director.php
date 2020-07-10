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

$sql="SELECT temp.director, temp.rate
            from(
                SELECT d.director as director,AVG(rating) as rate
                FROM director d, all_gender al
                where d.director IN (
                    SELECT temp.director
                    FROM (
                        SELECT d.director,count(*) as cnt
                        FROM director d
                        GROUP BY d.director)as temp
                    WHERE temp.cnt>30) AND d.id=al.id
                    GROUP BY d.director
                    ORDER BY AVG(rating) DESC) as temp";




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

echo '<div style="font-size:1.25em;color:red">導演作品平均得分(作品數量>30)</div>';
$director=Director;
$rate='Rating';

echo '<tr><td>','#','</td>';
echo '<td>',$director,'</td>';
echo '<td>',$rate,'</td>';
$rowid = 1;
while ($actor = $result->fetch_assoc()) {    
    echo '<tr><td>',$rowid,'</td>';
    $rowid = $rowid + 1;
    echo '<td>',$actor['director'],'</td>';
    echo '<td>',$actor['rate'],'</td>';

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