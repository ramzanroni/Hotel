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
	<title>Hotel</title>
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
			<div class="col-md-12">
				<p class="h2 text-center">Services</p>
				<hr style="height:3px;border-width:0;color:gray;background-color:gray; margin-right: 170px; margin-left: 170px">			
			</div>
			<div class="row mt-3 mb-3">
				<div class="col-md-4">
					
					<div class="geeks" style="position: relative;"> 
						<img src= 
						"image/food.jpeg"
						alt="Geeks Image" /> 
						<i class="fas fa-hamburger fa-5x text-white" style="position: absolute; top: 160px;left: 20px;"></i>
					</div> 
				</div>
				<div class="col-md-4">
					
					<div class="geeks" style="position: relative;"> 
						<img src= 
						"image/room.jpg"
						alt="Geeks Image" /> 
						<i class="fas fa-bed fa-5x text-white" style="position: absolute; top: 160px;left: 20px;"></i>
					</div>  
				</div>
				<div class="col-md-4">
					
					<div class="geeks" style="position: relative;"> 
						<img src= 
						"image/swi.jpg"
						alt="Geeks Image" /> 
						<i class="fas fa-swimming-pool fa-5x text-white" style="position: absolute; top: 160px;left: 20px;"></i>
					</div>  
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p class="h2 text-center">WELCOME TO THE HOTEL </p>

					<p class="h4 text-center" style="color: #c44e04;">WHATEVER <b>THE SEASON</b>, HOWEVER <b>THE MOMENT</b>, WE ALWAYS <b>WELCOME YOU</b></p>
					<hr style="height:3px;border-width:0;color:gray;background-color:gray; margin-right: 170px; margin-left: 170px">
					<div align="center">
						<img style="width: 40%;  align-content: center;" src="image/hotel.jpg">
					</div>
					<p class="p-5 text-center h4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor ......</p>
					<div align="center" class="mt-2 mb-4">
						<a  class="btn btn-warning p-2" href="about.php" >READ MORE</a>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<p class="h2 text-center">Fetured Rooms</p>
				<hr style="height:3px;border-width:0;color:gray;background-color:gray; margin-right: 170px; margin-left: 170px">			
			</div>
			


			<div id="carouselExampleIndicators1" class="carousel slide mt-2 aaa" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active shadow  bg-white rounded">
						<?php
						$sql=$conn->query("SELECT * FROM rooms LIMIT 1, 3");
						while ($row=mysqli_fetch_array($sql)) {
							?>
							<div class="card float-left m-2 ml-2 shadow p-3 mb-5 bg-white rounded" style="width: 23rem;">
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
					<div class="carousel-item">
						<?php
						$sql2=$conn->query("SELECT * FROM rooms LIMIT 3, 6");
						while ($row1=mysqli_fetch_array($sql2)) {
							?>
							<div class="ard float-left m-2 ml-2 shadow p-3 mb-5 bg-white rounded" style="width: 23rem;">
								<div class="card-body">
									<h5 class="card-title text-center"><?php echo $row1['room_cat']; ?></h5>
									<img class="img-thumbnail" src="admin/user_images/<?php echo $row1['photo'];  ?>">

									<p class="card-text text-center">Facility: <?php echo $row1['facility']; ?></p>
									<p class="text-center"><i class="fas fa-bed text-danger"></i> - <?php echo $row1['no_bed']; ?></p>
									<p class="text-center"><?php echo $row1['bedtype']; ?>&nbsp; Bed</p>
									<p class="text-center p-1" style="background-color: #ff7f50;"><?php echo "Price: ".$row1['price']." $ per/night"; ?></p>
									<a href="booking.php?room_id=<?php echo $row1['room_id']; ?>"class="btn btn-primary text-center m-2">Book Now</a>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<!-- <div class="carousel-item">
						<img style="height: 500px;" class="d-block w-100" src="image/cover3.jpg" alt="Third slide">
					</div> -->
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>


			<div class="row mt-2 mb-2">
				
				<div class="col-md-12">
					<div class="col-md-12">
						<p class="h2 text-center">Rooms Condition</p>
						<hr style="height:3px;border-width:0;color:gray;background-color:gray; margin-right: 170px; margin-left: 170px">
					</div>
					
				</div>

				<div class="col-md-6">
					<div class="content">
						<div class="content-overlay"></div>
						<img class="content-image" src="image/duplex.jpg">
						<div class="content-details fadeIn-bottom">
							<h3 class="content-title">Super Duplex</h3>
							<p class="content-text">This is 3 Star Deluxe Hotel Located Right On The Beach 100 Meter From Kolatoli Turning Point</p>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-6 p-3 shadow-sm p-3 mb-5 bg-white rounded">
				<p class="text-center h2">Duplex</p>
				<hr style="height:2px;border-width:0;color:gray;background-color:gray; margin-left: 260px; margin-right: 260px;">
				<p class="h4">All the rooms are designed to provide you best accommodation according to your need and budget. Sea front Deluxe Supreme rooms are to those who want to see the sea and feel the waves. From this room you can enjoy sunset lying in your bed. These rooms offer the best sea view in Cox′ Bazar.</p>
			</div>
			<div class="col-md-12 mt-2 mb-2">
				<div class="col-md-6 p-3 shadow-sm p-3 mb-5 bg-white rounded">
					<p class="text-center h2">Super Comfort</p>
					<hr style="height:2px;border-width:0;color:gray;background-color:gray; margin-left: 260px; margin-right: 260px;">
					<p class="h4">All the rooms are designed to provide you best accommodation according to your need and budget. Sea front deluxe rooms are to those who want to see the sea and feel the waves. From this room you can enjoy sunset lying in your bed.</p>
				</div>
				<div class="col-md-6">
					<div class="content">
						<div class="content-overlay"></div>
						<img class="content-image" src="image/super.jpeg">
						<div class="content-details fadeIn-bottom">
							<h3 class="content-title">Super Comfort</h3>
							<p class="content-text">All the rooms are designed to provide you best accommodation according to your need and budget. Sea front deluxe rooms are to those who want to see the sea and feel the waves. From this room you can enjoy sunset lying in your bed.</p>
						</div>
					</a>
				</div>
			</div>
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
<script type="text/javascript">
	$(function () {
		$('.toggle-menu').click(function(){
			$('.exo-menu').toggleClass('display');

		});

	});
</script>
