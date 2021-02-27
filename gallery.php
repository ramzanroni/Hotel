<?php
require_once 'class.user.php';
session_start();
$user = new USER();
if (isset($_SESSION['userSession'])) {
	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:userid");
	$stmt->execute(array(":userid"=>$_SESSION['userSession']));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);

}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
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
		

		<!-- <div class="col-lg-12"> -->
			<?php
			include_once 'menu_bar.php';
				//include_once 'menu.php';
			?>

			<!-- </div> -->

			
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
			  <?php  
			include_once 'imageview.html';
			?>  

			
			<?php 
			include ('footer.php');
			?> 
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	</body>
	</html>
	<script type="text/javascript">
		$(function () {
			$('.toggle-menu').click(function(){
				$('.exo-menu').toggleClass('display');

			});

		});
	</script>
