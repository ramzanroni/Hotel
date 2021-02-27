<?php
//index.php
require_once 'class.user.php';
session_start();
$user = new USER();
if (isset($_SESSION['userSession'])) {
	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:userid");
	$stmt->execute(array(":userid"=>$_SESSION['userSession']));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);

}

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{
	if(empty($_POST["name"]))
	{
		$error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
	}
	else
	{
		$name = clean_text($_POST["name"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
		}
	}
	if(empty($_POST["email"]))
	{
		$error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
	}
	else
	{
		$email = clean_text($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error .= '<p><label class="text-danger">Invalid email format</label></p>';
		}
	}
	if(empty($_POST["subject"]))
	{
		$error .= '<p><label class="text-danger">Subject is required</label></p>';
	}
	else
	{
		$subject = clean_text($_POST["subject"]);
	}
	if(empty($_POST["message"]))
	{
		$error .= '<p><label class="text-danger">Message is required</label></p>';
	}
	else
	{
		$message = clean_text($_POST["message"]);
	}
	if($error == '')
	{
		require 'class/class.phpmailer.php';
		$mail = new PHPMailer(true);
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "tls";                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 587;             
		$mail->AddAddress('');//add your email address
		$mail->Username='';  //add your email address
		$mail->Password='';  //add your email pass
		$mail->SetFrom($email,'Hotel Booking');
		$mail->AddReplyTo($email,"Hotel Booking");
		$mail->WordWrap = 50;
		$mail->IsHTML(true);
		$mail->Subject = $_POST["subject"];				//Sets the Subject of the message
		$mail->Body = $_POST["message"];	
		$mail->Send();	
		if($mail->Send())								//Send an Email. Return true on success or false on error
		{
			$error = '<label class="text-success">Thank you for contacting us</label>';
		}
		else
		{
			$error = '<label class="text-danger">There is an Error</label>';
		}
		$name = '';
		$email = '';
		$subject = '';
		$message = '';
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		
		<title>Send Your Feedcack || Hotel Management</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
	<body>
		<br />
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
				<div id="carouselExampleIndicators" class="carousel slide mt-2 aaa" data-ride="carousel">
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
				<div class="col-md-8" style="margin:0 auto; float:none;">
					<h3 align="center" class="h4 bg-warning p-3 mt-2">Send Your Feedback</h3>
					<br />
					<?php echo $error; ?>
					<form method="post">
						<div class="form-group">
							<label>Enter Name</label>
							<input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
						</div>
						<div class="form-group">
							<label>Enter Email</label>
							<input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
						</div>
						<div class="form-group">
							<label>Enter Subject</label>
							<input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="<?php echo $subject; ?>" />
						</div>
						<div class="form-group">
							<label>Enter Message</label>
							<textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
						</div>
						<div class="form-group" >
							<input type="submit" name="submit" value="Submit" class="btn btn-info form-control" />
						</div>
					</form>
				</div>
			</div>
			<?php 
			include ('footer.php');
			?>
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





