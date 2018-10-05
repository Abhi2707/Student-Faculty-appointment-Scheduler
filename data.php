<?php 
session_start();
include 'connection.php';

if (!$_SESSION) {
	header("Location: login.php");
	exit();
}

$id = $_SESSION['id'];

$query = "SELECT Teacher_Name, data FROM LOGIN WHERE Teacher_ID=$id";
$result = mysqli_query($con, $query);
$name = mysqli_fetch_assoc($result);

echo '<center>' ;
echo '<h1> Welcome '.$name['Teacher_Name'].'<br> </h1>';
echo '<h2> Live Status: '.$name['data'].'<br> </h2>';

?>

<form action="data.php" method="POST">
	<br><p>
	Select Status: <select name="data">
	<option value="BUSY">BUSY</option>
	<option value="AVAILABLE">AVAILABLE</option>
	<option value="other">OTHERS</option>
	</select>
	<input type="submit" name="submit" value="submit"></p>
</form>





<?php 
if(isset($_POST['submit']))
{
	$data = $_POST['data'];
	if($data==""){
		echo "Enter a valid status";
	}
	else if($data=="other")
	{
		echo "<form action=\"data.php\" method=\"POST\">
Enter Status: <input type=\"text\" name=\"data\">
<input type=\"submit\" name=\"submit\" value=\"submit\">
</form>";
	}
	else{
    $sql = "UPDATE LOGIN SET data='$data' WHERE Teacher_ID=$id";

	if (mysqli_query($con, $sql)) {
    header("Location: data.php");
	} else {
    echo "Error updating record: " . $con->error;
	}
	
	}
}
echo '</center>';
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		p {
			color: blue;
		}
	</style>
</head>
<body>
<p align="right"><a href="logout.php">Logout</a></p>
</body>
</html>
