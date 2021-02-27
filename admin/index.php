<?php
require_once 'dbconn.php';
session_start();
if (isset($_POST['submit'])) 
{
	$uname=$_POST['uname'];
	echo $uname;
	$pass=$_POST['upass'];
	$sql = $conn->query("SELECT * FROM admin ");
	
	if ($sql->num_rows>0) 
	{
		$row=$sql->fetch_assoc();
		if ($uname==$row['username'] && $pass=$row['password']) 
		{
			$_SESSION['username']=$row['username'];
			header("Location: admin.php");

		}
		else
			echo "Enter correct password and username";
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-6 ">
				<div class="shadow p-3 mb-5 bg-white rounded mt-5">
				<h2 class="bg-warning p-2">Admin Login</h2>
				<form method="post">
					<div class="form-group">
						<input type="text" name="uname" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="upass" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="form-control btn btn-primary">
					</div>
				</form>
			</div>
		</div>
			<div class="col-md-3">
				
			</div>
		</div>
	</div>
</body>
</html>