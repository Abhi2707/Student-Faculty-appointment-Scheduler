<!DOCTYPE html>
<html>
<head>
<h1 align="center">Bharat!!</h1>	
</head>
<body>

</body>
<form name="Teacher" action="view.php" method="post">
<p align="center">
Select Teacher: 
<select name="ID">
   <option value="101">Abhijeet</option>
   <option value="102">Divyank</option>
   <option value="103">Alind</option>
   <option value="104">Jogendra</option>
</select>
<input type="submit" name="submit" value="Search"/>
</p>
</form>
</html>

<?php 
include 'connection.php';
if(isset($_POST['submit']))
{
$a = $_POST['ID'];
$query = "SELECT Teacher_Name, data FROM LOGIN WHERE TEACHER_ID=$a";
$result = mysqli_query($con, $query);
$info = mysqli_fetch_assoc($result);
echo "<center>Teacher ".$info['Teacher_Name']." is ".$info['data'].'</center>';
}
?>