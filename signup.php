<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('index.php');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['name']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		<div>
		<strong>Sorry !</strong>  email allready exists , Please Try another one
		</div>
		";
	}

	else

	{
		if($reg_user->register($uname,$email,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
			Hello $uname,
			<br /><br />
			Welcome to IsDB!<br/>
			To complete your registration  please , just click following link<br/>
			<br /><br />
			<a href='localhost/classwork/Hotel/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
			<br /><br />
			Thanks,";

			$subject = "Confirm Registration";

			$reg_user->send_mail($email,$message,$subject);	
			
			$msg = "
			<div>
			<strong>Success!</strong>  We've sent an email to $email.
			Please click on the confirmation link in the email to create your account. 
			</div>
			";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
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
						<a class="btn btn-primary float-right" href="login.php">Login</a>
					</div>
				</div>
			</div>
		</div>
		<?php
				include_once 'menu_bar.php';

				?>
		<div id="carouselExampleIndicators" class="carousel slide mb-2" data-ride="carousel">
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
		</div>
		<div class="row">
			<div class="col-3">
				
			</div>
			<div class="col-6">
				<?php if(isset($msg)) echo $msg;  ?>
				<form method="post">
					<h2 class="text-center text-white bg-warning p-2 mt-2">Sign Up</h2><br>
					<script type="text/javascript">
						$(document).ready(function()
						{    
							$("#name").keyup(function()
							{		
								var name = $(this).val();	

								if(name.length > 3)
								{		
									$("#result").html('checking...');



									$.ajax({

										type : 'POST',
										url  : 'username-check.php',
										data : $(this).serialize(), 
										success : function(data)
										{
											$("#result").html(data);
										}
									});
									return false;

								}
								else
								{
									$("#result").html('');
								}
							});

						});
					</script>
					<div class="form-group">
						<input class="form-control" type="text" id="name" placeholder="Username" name="name" required />
						<span id="result"></span>
					</div>
					<div class="form-group">
						<input class="form-control" type="email" placeholder="Email address" name="txtemail" required />
					</div>
					<div class="form-group">
						<input class="form-control" type="password" placeholder="Password" name="txtpass" required />
					</div>

					<div class="form-group">
						<button class="form-control btn btn-success" type="submit" name="btn-signup">Sign Up</button>
					</div>

					<a href="login.php" style="float:left;">Sign In</a>
				</form>
			</div>
			<div class="col-3">
				
			</div>    		
		</div>

<?php 
		include ('footer.php');
		?>
	</div> 
</body>
</html>