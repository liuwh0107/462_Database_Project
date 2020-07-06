<?php
    include("connectdb.php");
    if((!($adminlogin)) and ($Act>=51)){
	    header("location:index.php");
    }
?>
<html>
<head>
  <title> IMDB  MOVIE </title>
  <link rel = stylesheet herf="style<?php echo rand(1,3); ?>.css">
</head>

<body>
<table width=700 border=0 align=center>
   <tr><td colspan=2>
       <h1>
       <?php
          switch($Act){
                default:

		case 1:
                  echo "content";
		  break;
		case 2:
	          echo "new content";
		  break;
		case 50:
		  echo "manager login";
		  break;
		case 51:
		  echo "delete content";
		  break;
	  }
?>
</h1>
</td></tr>
<tr>
    <?php
    ?>
    <td width=120 valign=top>
        <table width=120 border=0>
          <tr><td class=td9>  <a href=index.php?Act=1>see content</a> </td></tr>
	  <tr><td class=td9>  <a href=index.php?Act=2>new content</a> </td></tr>
     <?php
        if(!($adminlogin)){
		echo "<tr><td class=td9> <a href=index.php?Act=50>manager login</a> </td></tr>";
	}else{
		echo "<tr><td class=td9> <a href=index.php?Act=51>delete content</a> </td></tr>";
?>
</table>
</td>
<td>

<?php 
	if($Act=1){
		include("")
