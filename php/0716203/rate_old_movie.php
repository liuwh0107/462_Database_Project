<html>
<body>
<form action="receive_old_movie.php" method="post">
<?php
$title= $_POST['title'];
?>
 rating :
 <select name="rating">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
</select>
<pre>&nbsp</pre>

gender :
<select name="gender">
    <option value="male">male</option>
    <option value="female">female</option>
    </select>
<pre>&nbsp</pre>

age:
<select name="age">
    <option value="0_18">0-18</option>
    <option value="18_30">18-30</option>
    <option value="30_45">30-45</option>
    <option value="45up">45up</option>
    </select>
    <pre>&nbsp</pre>

    <input type='hidden' name='title' value="<?php echo $title; ?>" >
    <input type="submit" value="提交"">
</form>
<form action="info.php" method="post">
<input type="submit" value='回到主畫面'>
</form>
</body>
</html>
