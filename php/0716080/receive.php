<table border="1">
<tr>
<?php
    $mysqli = new mysqli('localhost', 'root', 'password', 'project');

// Oh no! A connect_errno exists so the connection attempt failed!
    if ($mysqli->connect_errno) {
        echo "Sorry, this website is experiencing problems.";

        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
    
        exit;
}
    $country=$_POST['country'] ;
    $genre= $_POST['genre'];
    $rating = $_POST['rating'];
    $sort= $_POST['sort'];
    $title= $_POST['title'];
    $duration= $_POST['duration'];
    $rows= $_POST['rows'];
    $gender= $_POST['gender'];
    $director = $_POST['director'];
    $age= $_POST['age'];
    $award= $_POST['award'];
    $start= $_POST['start'];
    $end = $_POST['end'];
    $vote_number= $_POST['vote_number'];
    //echo "$country";
    if($country!='select')
    {
        $from=' movie_detail c,';
        $where='m.id=c.id and c.country='.'\''.$country.'\''.' and ';
    }
    //echo "$genre/n";
    if($genre!='select')
    {
        $from=$from.' genre g,';
        $where=$where.'g.id=m.id and g.genre='.'\''.$genre.'\''.' and ';
    }
    if($rating!='select')
    {
        //echo "$gender/n";
        if($gender=='all')
        {
            if($age=='select')
            {
                $from=$from.' all_gender al, ';
                $where=$where.' al.id=m.id and al.rating>='.$rating.' and ';
                $order=' al.rating'; 
            }
            else if($age=='0_18')
            {
                $from=$from.' all_gender al, ';
                $where=$where.' al.id=m.id and al.avg_0_18>='.$rating.' and '; 
                $order='al.avg_0_18';   
            }
            else if($age=='18_30')
            {
                $from=$from.' all_gender al, ';
                $where=$where.' al.id=m.id and al.avg_18_30>= '.$rating.' and ';  
                $order='al.avg_18_30';  
            }
            else if($age=='30_45')
            {
                $from=$from.' all_gender al, ';
                $where=$where.' al.id=m.id and al.avg_30_45>= '.$rating.' and '; 
                $order='al.avg_30_45';   
            }
            else 
            {
                $from=$from.' all_gender al, ';
                $where=$where.' al.id=m.id and al.avg_45up>= '.$rating.' and ';   
                $order='al.avg_45up'; 
            }
            
        }
        else if($gender=='male')
        {
            if($age=='select')
            {
                $from=$from.' male al, ';
                $where=$where.' al.id=m.id and al.rating>= '.$rating.' and ';
                $order='al.rating'; 
            }
            else if($age=='0_18')
            {
                $from=$from.' male al, ';
                $where=$where.' al.id=m.id and al.avg_0_18>= '.$rating.' and ';
                $order='al.avg_0_18';    
            }
            else if($age=='18_30')
            {
                $from=$from.' male al, ';
                $where=$where.' al.id=m.id and al.avg_18_30>= '.$rating.' and ';
                $order='al.avg_18_30';    
            }
            else if($age=='30_45')
            {
                $from=$from.' male al, ';
                $where=$where.' al.id=m.id and al.avg_30_45>= '.$rating.' and '; 
                $order='al.avg_30_45';   
            }
            else 
            {
                $from=$from.' male al, ';
                $where=$where.' al.id=m.id and al.avg_45up>= '.$rating.' and '; 
                $order='al.avg_45up';   
            }
        }
        else
        {
            if($age=='select')
            {
                $from=$from.' female al, ';
                $where=$where.' al.id=m.id and al.rating>= '.$rating.' and '; 
                $order='al.rating';
            }
            else if($age=='0_18')
            {
                $from=$from.' female al, ';
                $where=$where.' al.id=m.id and al.avg_0_18>= '.$rating.' and '; 
                $order='al.avg_0_18';   
            }
            else if($age=='18_30')
            {
                $from=$from.' female al, ';
                $where=$where.' al.id=m.id and al.avg_18_30>= '.$rating.' and ';   
                $order='al.avg_18_30'; 
            }
            else if($age=='30_45')
            {
                $from=$from.' female al, ';
                $where=$where.' al.id=m.id and al.avg_30_45>= '.$rating.' and ';  
                $order='al.avg_30_45';  
            }
            else 
            {
                $from=$from.' female al, ';
                $where=$where.' al.id=m.id and al.avg_45up>= '.$rating.' and ';  
                $order='al.avg_45up';  
            }
        }

    }
    else
    {
        $order=' al_2.rating ';
    }
    if($title!='')
    {
        $from=$from.' movie m1, ';
        $where=$where.' m1.id=m.id and m1.title like '.'\'%'.$title.'%\' and ';
    }
    if($duration!='select')
    {
        //echo "$gender/n";
        if($duration=='lower_than_90')
        {
            $from=$from.' movie_detail ml_1, ';
            $where=$where.' ml_1.id=m.id and ml_1.duration <90 and ';
        }
        else if($duration=='90_to_150')
        {
            $from=$from.' movie_detail ml_1, ';
            $where=$where.' ml_1.id=m.id and ml_1.duration >90 and ml_1.duration<150 and ';
        }
        else
        {
            $from=$from.' movie_detail ml_1, ';
            $where=$where.' ml_1.id=m.id and ml_1.duration >150 and ';
        }

    }
    if($director!='')
    {
        $from=$from.' director d, ';
        $where=$where.' d.id=m.id and d.director like '.'\'%'.$director.'%\' and ';
    }
    if($award!='select')
    {
        $from=$from.' '.$award.' a, ';
        $where=$where.' a.film=m.title and a.win=\'TRUE\' and' ;
    }
    if($start!=''&& $end!='')
    {
        $where=$where.' m.year >'.$start.' and m.year<'.$end.' and ';
    }
    if($vote_number!='')
    {
        //echo "$gender/n";
        if($gender=='all')
        {
            if($age=='select')
            {
                $from=$from.' all_gender al_1, ';
                $where=$where.' al_1.id=m.id and al_1.votes> '.$vote_number.' and '; 
            }
            else if($age=='0_18')
            {
                $from=$from.' all_gender al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_0_18> '.$vote_number.' and ';    
            }
            else if($age=='18_30')
            {
                $from=$from.' all_gender al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_18_30> '.$vote_number.' and ';    
            }
            else if($age=='30_45')
            {
                $from=$from.' all_gender al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_30_45> '.$vote_number.' and ';    
            }
            else 
            {
                $from=$from.' all_gender al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_45up> '.$vote_number.' and ';    
            }
            
        }
        else if($gender=='male')
        {
            if($age=='select')
            {
                $from=$from.' male al_1, ';
                $where=$where.' al_1.id=m.id and al_1.votes> '.$vote_number.' and '; 
            }
            else if($age=='0_18')
            {
                $from=$from.' male al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_0_18> '.$vote_number.' and ';    
            }
            else if($age=='18_30')
            {
                $from=$from.' male al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_18_30> '.$vote_number.' and ';    
            }
            else if($age=='30_45')
            {
                $from=$from.' male al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_30_45> '.$vote_number.' and ';    
            }
            else 
            {
                $from=$from.' male al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_45up> '.$vote_number.' and ';    
            }
        }
        else
        {
            if($age=='select')
            {
                $from=$from.' female al_1, ';
                $where=$where.' al_1.id=m.id and al_1.votes> '.$vote_number.' and '; 
            }
            else if($age=='0_18')
            {
                $from=$from.' female al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_0_18> '.$vote_number.' and ';    
            }
            else if($age=='18_30')
            {
                $from=$from.' female al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_18_30> '.$vote_number.' and ';    
            }
            else if($age=='30_45')
            {
                $from=$from.' female al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_30_45> '.$vote_number.' and ';    
            }
            else 
            {
                $from=$from.' female al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_45up> '.$vote_number.' and ';    
            }
        }

    }
    $srating=$order.' as rate';
    if($sort=='rating_low_to_high')
    {
        $order=' ORDER BY '.$order.' ASC ';
    }
    else if($sort=='rating_high_to_low')
    {
        $order=' ORDER BY '.$order.' DESC ';
    }
    else
    {
        $order=' ORDER BY m.title ';
    }
    if($rows!='')
    {

        $limit=' LIMIT '.$rows;
    }
    else
    {
        $limit='';
    }

    $from =$from.' movie m, all_gender al_2';
    $where=$where.' m.id=al_2.id ';
    $sql_str='SELECT temp.title, temp.rate FROM'.'(SELECT'.' DISTINCT m.title, '.$srating.' FROM'.$from.' WHERE '.$where.$order.$limit.')as temp';
    echo "$sql_str";
    $sql="$sql_str";
    if (!$result = $mysqli->query($sql)) {
        // Oh no! The query failed. 
        echo "Sorry, the website is experiencing problems.";
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }
    if ($result->num_rows === 0) {
        // Oh, no rows! Sometimes that's expected and okay, sometimes
        // it is not. You decide. In this case, maybe actor_id was too
        // large? 
        echo "We could not find a match for ID $aid, sorry about that. Please try again.";
        exit;
    }
    
    //echo '<div style="font-size:1.25em;color:red">avg_rating_of_director(movie>30) </div>';
    $title=title;
    $rate=rate;
    echo '<tr><td>',$title,'</td>';
    echo '<td>',$rate,'</td>';
    while ($ans = $result->fetch_assoc()) {    
        echo '<tr><td>',$ans['title'],'</td>';
        echo '<td>',$ans['rate'],'</td>';
      
    }
    
    
    
    $result->free();
    $mysqli->close();


?>
</tr>
</table>