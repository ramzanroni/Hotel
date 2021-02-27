<?php 
require_once 'class.user.php';
include_once 'dbconn.php';
session_start();
$user = new USER();
if (isset($_SESSION['userSession'])) {
	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:userid");
	$stmt->execute(array(":userid"=>$_SESSION['userSession']));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);

}

if (isset($_POST['submit'])) 
{
	$id=$_SESSION['userSession'];
	$oldpass=trim($_POST['oldpass']);
	$newpass1=trim($_POST['newpass1']);
	$newpass2=trim($_POST['newpass2']);
	$oldpass_md5 = md5($oldpass);
	$newpass1_md5= md5($newpass1);
	$newpass2_md5= md5($newpass2);
	if ($oldpass_md5 == $row['userPass']) 
	{
		if ($newpass1_md5 == $newpass2_md5) 
		{
			$sql=$conn->query("UPDATE tbl_users SET userPass='$newpass1_md5' WHERE userID='$id'");
			if ($sql) 
			{
				echo "<script>alert('Password Update Successfully...!');</script>";

				echo "<script>window.location.replace('user_profile.php')</script>";
			}
			else
			{
				echo "<script>alert('Some Thing is worng...!');</script>";
			}
		}
		else
		{
			
echo "<script>alert('Please enter same password in new password fild...!');</script>";
			echo "<script>window.location.replace('change_pass.php')</script>";
		}
	}
	else
	{
		echo "<script>alert('Old password does not match ...!');</script>";
		echo "<script>window.location.replace('change_pass.php')</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Change Password
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div style="background: #08062e;" class="col-md-12 col-sm-12 col-lg-12  p-2 mt-1">
				<div class="row">
					<div class=" col-lg-4 col-md-4">
						<p class="text-white"><i class="fas fa-map-marker"></i> 603/b Shamim Saroni, Mirpur, Dhaka</p>
					</div>
					<div class=" col-lg-4 col-md-4">
						<p class="text-white"><i class="fas fa-envelope-open"></i> hotel@gmail.com</p>
					</div>
					<div class=" col-lg-4 col-md-4">
						<?php
						if (isset($_SESSION['userSession'])) 
						{
							?>

							<span class="text-white"><i class="fas fa-user"></i> &nbsp;&nbsp;<?php echo $row['userName'];?></span><a class="btn btn-primary float-right" href="logout.php">Logout</a>
							<?php

						}
						else
						{
							?>
							<a class="btn btn-primary float-right" href="login.php">Login</a>
							<?php
						}
						?>


					</div>
				</div>
			</div>
		</div>
		<?php
		include_once 'menu_bar.php';
                //include_once 'menu.php';
		?>
		<div class="row">
			<div class="col-md-2">

			</div>
			<div class="col-md-8">
				<form method="post">
					<p class="h2 bg-warning text-center p-2">Change your Password</p>
					<div class="form-group">
						<legend>Enter Your Old Password</legend>
						<input type="password" name="oldpass" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Enter Your New Password</label>
						<input type="password" name="newpass1" class="form-control" required>
					</div>
					<div>
						<label>Re Enter Your Password</label>
						<input type="password" name="newpass2" class="form-control" required>
					</div>
					<div class="form-group">
						<br><input type="submit" name="submit" value="Change Password" class="btn btn-success">
					</div>
				</form>
			</div>
			<div class="col-md-2">

			</div>
		</div>

		<?php 
		include ('footer.php');
		?>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
</body>
</html>
<script type="text/javascript"> 
	$(function () {
		$('.toggle-menu').click(function(){
			$('.exo-menu').toggleClass('display');

		});

	});
</script>
