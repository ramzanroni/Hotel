<?php
require_once 'class.user.php';
session_start();
require_once 'dbconn.php';
$user = new USER();
if (isset($_SESSION['userSession'])) 
{
	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:userid");
	$stmt->execute(array(":userid"=>$_SESSION['userSession']));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);

}

$sql=$conn->query("SELECT * FROM room_booking");
if (isset($_GET['bookingId']) && isset($_GET['amount'])) 
{
	$amount=$_GET['amount'];
	$bookid=$_GET['bookingId'];
	$sqlip=$conn->query("UPDATE room_booking SET  payment='$amount' WHERE BookingNumber='$bookid'");
	if ($sqlip) 
	{
		echo "<script>alert('Update Successfully...!');</script>";

		echo "<script>window.location.replace('booking_history.php')</script>";
	}
	else
	{
		echo "<script>alert('Something is worng...!');</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Booking || Hotel Management</title>
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
		<?php
		include_once 'menu_bar.php';

		?>
		<div class="row">
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
		</div>

		<div class="row">
			<div class="col-md-12 mt-2 bg-muted" style="background-color: #919191;">
				<div class="col-md-5">
					<img width="20%" src="image/user.png" class="p-2">
				</div>
				<div class="col-md-7">
					<p class="h2 "><?php echo "Mr/Miss: ".$row['userName']; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php 
				$email= $_SESSION['email'];
				$sql1=$conn->query("SELECT * FROM room_booking WHERE userEmail='$email' ");
				$data=$sql1->num_rows;
				//$results=mysqli_fetch_array($sql1);
				if ($data>0) {
					
				
				while ($results=mysqli_fetch_array($sql1)) 
				{
					?>
					<div class="row shadow p-3 mb-5 bg-white rounded">
						<div class="col-md-5">
							<p class="h2">#My Booking</p>
							<img width="20%" src="image/book.jpg">

							<p class="h3 "><?php echo "Booking Number: &nbsp".$results['BookingNumber']; ?></p>
						</div>
						
					
						<table class="table  table-hover table-striped ">
							<thead class="thead-dark">
								<tr>
									<th scope="col">Room Number</th>
									<th scope="col">User Name</th>
									<th scope="col">From Date</th>
									<th scope="col">To Date</th>
									<th scope="col">Number of Days</th>
									<th scope="col">Amount</th>
									<th scope="col">Amount With 2% vat</th>
								</tr>
								</thead>
								<tr class="table-success">
									<td><?php echo $results['roomId']; ?></td>
									<td><?php echo $row['userName']; ?></td>
									<td><?php echo $results['FromDate']; ?></td>
									<td><?php echo $results['ToDate']; ?></td>
									<td>
										<?php  
										$c=0;
										$fdate=$results['FromDate'];
										$edate=$results['ToDate'];
										$datetime1 = date_create($fdate); 
										$datetime2 = date_create($edate); 
										$interval = date_diff($datetime1, $datetime2);
										$date= $interval->format('%a');
										echo $date;

										?>
									</td>
									<td>
										<?php  
										$room_id=$results['roomId'];
										$sqldata=$conn->query("SELECT * FROM rooms WHERE room_id='$room_id'");
										$res=mysqli_fetch_array($sqldata);
										$total_amount= $res['price']*$date;
										echo $total_amount;

										?>

									</td>
									<td><?php   
									$amount_with_vat=($total_amount+((2*$total_amount)/100));
									echo $amount_with_vat;
									?></td>
								</tr>
							
						</table>

						<div class="col-md-7">
							<?php 
							if ($results['Status']==0 && $results['payment'] ==0) 
							{
								
								?>
								<a class="btn btn-warning p-2" href="booking_history.php?bookingId=<?php echo $results['BookingNumber']; ?>&amount=<?php echo $amount_with_vat; ?>">Pay Now</a>

								<?php


							}
							else if ($results['Status']=="complete") {
								?>
								<p class="btn btn-danger p-2">Complete</p>
								<?php
							}
							else if ($results['Status']==1 && $results['payment'] !=0) 
							{
								?>
								<p class="btn btn-success p-2">Comfirmed</p>
								<?php
							}
							else if ($results['Status']==0 && $results['payment'] !=0) 
							{
								?>
								<p class="btn btn-info p-2">Not Yet Confirm</p>
								<?php
							}
							
							
							?>
						</div>
					</div>
					<hr>
					<?php
				}
			}
				else
				{
					?>
					<p>No Record</p>
					<?php
				}
				?>
			</div>
		</div>

		<?php 



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