<?php 
include 'connection.php';
$data_sql = "select * from login";
$data_res = mysqli_query($con, $data_sql) or die(mysqli_error($con));

$display = "
<!DOCTYPE html>
<html>
<head>
<h1 align=\"center\">Welcome to the teacher status portal</h1>	
</head>
<body>

</body>
<form name=\"Teacher\" action=\"index.php\" method=\"post\">
<p align=\"center\">
Select Teacher: 
<select name=\"ID\">
";
 
while ($info = mysqli_fetch_array($data_res)) {
	$display .= "  <option value=".$info["Teacher_ID"].">".$info["Teacher_Name"]."</option>";
}

$display .= "</select>
<input type=\"submit\" name=\"submit\" value=\"Search\"/>
</p>
</form>
</html>";
echo $display;
 ?>

  
<?php 

if(isset($_POST['submit']))
{
$a = $_POST['ID'];
$query = "SELECT Teacher_Name, data FROM LOGIN WHERE TEACHER_ID=$a";
$result = mysqli_query($con, $query);
$info = mysqli_fetch_assoc($result);
echo "<center>Teacher ".$info['Teacher_Name']." is ".$info['data'].'</center>';
}
?>