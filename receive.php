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

  function check($rows,$start,$end,$vote_number)
 {
   $error='';
   //error_handling of row
   if(!is_numeric($rows) )
   {
      if($rows!='')$error=$error."# of Result Rows must be integer!<br>";
   }
   else 
   {
      if($rows <=0)$error=$error."# of Result Rows must >0!<br>";
   }
   
   if(!is_numeric($start) )
   {
      if($start!='')$error=$error."start of the year must be integer!<br>";
   }

    if(!is_numeric($end) )
   {
      if($end!='')$error=$error."end of the year must be integer!<br>";
   }
   
    if(!is_numeric($vote_number) )
   {
      if($vote_number!='')$error=$error."Minimum # of Votes must be integer!<br>";
   }
    else 
   {
      if($vote_number <0) $error=$error."Minimum # of Votes can't be negative!<br>";
   }
   if($error!='')throw new Exception($error);
 
 return true;
 }

try
{
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
    $select_in= 'm.title, m.year';
    $select_out= 'temp.title, temp.rate, temp.year';

    //error handling
    check($rows,$start,$end,$vote_number);
    
    $rows=intval($rows);
    $start=intval($start);
    $end=intval($end);
    $vote_number=intval($vote_number);
    if($end<$start)
    {
        $tem=$start;
        $start=$end;
        $end=$tem;
        echo "Warning:start year should not be larger than end year!";
    }

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
            $select_in=$select_in.', ml_1.duration';
            $select_out=$select_out.', temp.duration';
        }
        else if($duration=='90_to_150')
        {
            $from=$from.' movie_detail ml_1, ';
            $where=$where.' ml_1.id=m.id and ml_1.duration >90 and ml_1.duration<150 and ';
            $select_in=$select_in.', ml_1.duration';
            $select_out=$select_out.', temp.duration';
        }
        else
        {
            $from=$from.' movie_detail ml_1, ';
            $where=$where.' ml_1.id=m.id and ml_1.duration >150 and ';
            $select_in=$select_in.', ml_1.duration';
            $select_out=$select_out.', temp.duration';
        }

    }
    if($director!='')
    {
        $from=$from.' director d, ';
        $where=$where.' d.id=m.id and d.director like '.'\'%'.$director.'%\' and ';
        $select_in=$select_in.', d.director';
        $select_out=$select_out.', temp.director';
    }
    if($award!='select')
    {
        $from=$from.' '.$award.' a, ';
        $where=$where.' a.film=m.title and a.win=\'TRUE\' and' ;
    }
    if($start!=''&& $end!='')
    {
        $where=$where.' m.year >='.$start.' and m.year<='.$end.' and ';
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
                $select_in=$select_in.', al_1.votes as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
            else if($age=='0_18')
            {
                $from=$from.' all_gender al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_0_18> '.$vote_number.' and ';    
                $select_in=$select_in.', al_1.num_0_18 as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
            else if($age=='18_30')
            {
                $from=$from.' all_gender al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_18_30> '.$vote_number.' and ';    
                $select_in=$select_in.', al_1.num_18_30 as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
            else if($age=='30_45')
            {
                $from=$from.' all_gender al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_30_45> '.$vote_number.' and ';   
                $select_in=$select_in.', al_1.num_30_45 as vote_number';
                $select_out=$select_out.', temp.vote_number'; 
            }
            else 
            {
                $from=$from.' all_gender al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_45up> '.$vote_number.' and ';    
                $select_in=$select_in.', al_1.num_45up as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
            
        }
        else if($gender=='male')
        {
            if($age=='select')
            {
                $from=$from.' male al_1, ';
                $where=$where.' al_1.id=m.id and al_1.votes> '.$vote_number.' and '; 
                $select_in=$select_in.', al_1.votes as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
            else if($age=='0_18')
            {
                $from=$from.' male al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_0_18> '.$vote_number.' and ';    
                $select_in=$select_in.', al_1.num_0_18 as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
            else if($age=='18_30')
            {
                $from=$from.' male al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_18_30> '.$vote_number.' and ';    
                $select_in=$select_in.', al_1.num_18_30 as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
            else if($age=='30_45')
            {
                $from=$from.' male al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_30_45> '.$vote_number.' and ';    
                $select_in=$select_in.', al_1.num_30_45 as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
            else 
            {
                $from=$from.' male al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_45up> '.$vote_number.' and ';    
                $select_in=$select_in.', al_1.num_45up as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
        }
        else
        {
            if($age=='select')
            {
                $from=$from.' female al_1, ';
                $where=$where.' al_1.id=m.id and al_1.votes> '.$vote_number.' and '; 
                $select_in=$select_in.', al_1.votes as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
            else if($age=='0_18')
            {
                $from=$from.' female al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_0_18> '.$vote_number.' and ';   
                $select_in=$select_in.', al_1.num_0_18 as vote_number';
                $select_out=$select_out.', temp.vote_number'; 
            }
            else if($age=='18_30')
            {
                $from=$from.' female al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_18_30> '.$vote_number.' and ';   
                $select_in=$select_in.', al_1.num_18_30 as vote_number';
                $select_out=$select_out.', temp.vote_number'; 
            }
            else if($age=='30_45')
            {
                $from=$from.' female al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_30_45> '.$vote_number.' and ';    
                $select_in=$select_in.', al_1.num_30_45 as vote_number';
                $select_out=$select_out.', temp.vote_number';
            }
            else 
            {
                $from=$from.' female al_1, ';
                $where=$where.' al_1.id=m.id and al_1.num_45up> '.$vote_number.' and ';    
                $select_in=$select_in.', al_1.num_45up as vote_number';
                $select_out=$select_out.', temp.vote_number';
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
    $sql_str='SELECT '.$select_out.' FROM'.'(SELECT DISTINCT '.$srating.', '.$select_in.' FROM'.$from.' WHERE '.$where.$order.$limit.')as temp';
   // echo "$sql_str";
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
        echo "抱歉，並未查詢到符合條件的電影<br>";
        
    }
    else
    {

        //echo '<div style="font-size:1.25em;color:red">avg_rating_of_director(movie>30) </div>';
        $title=Title;
        $rate=Rating;
        echo '<tr><td>','#','</td>';
        echo '<td>',$title,'</td>';
        echo '<td>','Year','</td>';
        echo '<td>',$rate,'</td>';
        if($duration!='select')
        {
            echo '<td>','Duration','</td>';
        }
        if($director!='')
        {
            echo '<td>','Director','</td>';
        }
        if($vote_number!='')
        {
            echo '<td>','# of Votes','</td>';
        }
        while ($ans = $result->fetch_assoc()) {    
            $rowid = $rowid + 1;
            echo '<tr><td>',$rowid,'</td>';
            echo '<td>',$ans['title'],'</td>';
            echo '<td>',$ans['year'],'</td>';
            echo '<td>',$ans['rate'],'</td>';
            if($duration!='select')
            {
                echo '<td>',$ans['duration'],'</td>';
            }
            if($director!='')
            {
                echo '<td>',$ans['director'],'</td>';
            }
            if($vote_number!='')
            {
                echo '<td>',$ans['vote_number'],'</td>';
            }
            
        }
    }
    
    
    
    $result->free();
    $mysqli->close();
}
catch(Exception $e)
 {
 echo "Error Message: " .$e->getMessage();
 }
 
?>
</tr>
</table>

<form action="post.php" method="post">
<input type="submit" value='重新查詢'>
</form>
<form action="info.php" method="post">
<input type="submit" value='回到主畫面'>
</form>
