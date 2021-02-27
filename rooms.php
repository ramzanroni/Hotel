<?php
require_once 'class.user.php';
session_start();
$user = new USER();
require_once 'dbconn.php';
if (isset($_SESSION['userSession'])) {
	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:userid");
	$stmt->execute(array(":userid"=>$_SESSION['userSession']));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
	

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Room || Collection</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
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
			
			<div id="carouselExampleIndicators" class="carousel slide mt-2" data-ride="carousel">
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

			<div class="row mt-4 mb-2">
				<div class="col-md-12">
					<?php
					$sql=$conn->query("SELECT * FROM rooms");
					while ($row=mysqli_fetch_array($sql)) {
						?>
						<div class="card float-left m-1 mt-2 shadow p-3 mb-5 bg-white rounded" style="width: 22.5rem;">
							<div class="card-body">
								<h5 class="card-title text-center"><?php echo $row['room_cat']; ?></h5>
								<img class="img-thumbnail" src="admin/user_images/<?php echo $row['photo'];  ?>">
								
								<p class="card-text text-center">Facility: <?php echo $row['facility']; ?></p>
								<p class="text-center"><i class="fas fa-bed text-danger"></i> - <?php echo $row['no_bed']; ?></p>
								<p class="text-center"><?php echo $row['bedtype']; ?>&nbsp; Bed</p>
								<p class="text-center p-1" style="background-color: #ff7f50;"><?php echo "Price: ".$row['price']." $ per/night"; ?></p>
								<a href="booking.php?room_id=<?php echo $row['room_id']; ?>"class="btn btn-primary text-center m-2">Book Now</a>
							</div>
						</div>
						<?php
					}
					?>
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