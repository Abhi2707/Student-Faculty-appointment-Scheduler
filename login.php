<?php 
session_start();
session_destroy();
session_start();
if (isset($_POST['submit'])) {
	include "connection.php";
	$id = $_POST['id'];
	$pass = $_POST['password'];

	$query = "SELECT PASSWORD FROM LOGIN WHERE TEACHER_ID=$id";
	$result = mysqli_query($con, $query);
    $password = mysqli_fetch_assoc($result);

    if($password['PASSWORD']==$pass){
    	$_SESSION['id']=$id;
    	header("Location: data.php");
        exit; 
     }
    else echo '<p>'.'Password Incorrect'.'</p>';
	
}
?>
<html>
<head>
	<style type="text/css">
		h1{
			color: white;
			background-color: black;
		}

		button {
			line-height: 2;
			letter-spacing: 3;
		}

		button:hover {
			background-color: black;
			color: white;
		}

		p{
			color: red;
		}

	</style>
</head>
<h1 align="center">Login Page</h1>
<form action="login.php" method="post" align="center">

	Teacher_ID : <input type="text" name="id"><br><br>
	Password &nbsp&nbsp&nbsp: <input type="password" name="password"><br><br>
	<button type="submit" name="submit">Submit</button>

</form>
</html>