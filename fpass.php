<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
	$user->redirect('index.php');
}

if(isset($_POST['btn-submit']))
{
	$email = $_POST['txtemail'];
	
	$stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userEmail=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));

	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['userID']);
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userEmail=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "
		Hello , $email
		<br /><br />
		We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
		<br /><br />
		Click Following Link To Reset Your Password 
		<br /><br />
		<a href='localhost/classwork/Hotel/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
		<br /><br />
		thank you :)
		";
		$subject = "Password Reset";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div>
		We've sent an email to $email.
		Please click on the password reset link in the email to generate new password. 
		</div>";
	}
	else
	{
		$msg = "<div>
		<strong>Sorry!</strong>  this email not found. 
		</div>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
</head>
<body >
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
						<a class="btn btn-primary float-right" href="login.php">Login</a>
					</div>
				</div>
			</div>
		</div>
		<?php
				include_once 'menu_bar.php';

				?>
		<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img style="height: 500px;" class="d-block w-100 " src="image/cover1.jpg" alt="First slide">
				</div>
				<div class="carousel-item">
					<img style="height: 500px;" class="d-block w-100 " src="image/cover2.jpg" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img style="height: 500px;" class="d-block w-100" src="image/cover3.jpg" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div> -->
		<div align="center" class="row">
			<div class="col-md-2">
				
			</div>
			<div align="center" class="col-md-8 shadow p-3 mb-5 bg-white rounded mt-4">
			<form  method="post">
			<p class="h2 text-center bg-warning p-2">Forget Password</p><hr />
			
			<?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
				<div>
					Please enter your email address. You will receive a link to create a new password via email.!
				</div>  
				<?php
			}
			?>
			<div class="form-group">
				<input class="form-control" type="email" placeholder="Email address" name="txtemail" required />
			</div>
			<div class="form-group">
				<button class="form-control btn btn-info" type="submit" name="btn-submit">Generate new Password</button>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>