<?php
require_once 'class.user.php';
session_start();
$user = new USER();
if (isset($_SESSION['userSession'])) {
	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:userid");
	$stmt->execute(array(":userid"=>$_SESSION['userSession']));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	require_once 'dbconn.php';
	$email = $_SESSION['email'];
	$order_num=$_SESSION['BookingNumber'];
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

			?>



			<div class="col-md-12 col-lg-12 jumbotron">
				<div class="">
					<div class="col-md-4">
						<div class="col-md-6"><img width="50%" src="image/user.png"></div>
						<p>Mr/Miss: <?php echo $row['userName']; ?></p>
					</div>
				</div>

			</div>
			<div class="col-md-12">
				<p class="h3">My Booking</p>
				<?php 
				$sql=$conn->query("SELECT * FROM room_booking WHERE BookingNumber='$order_num'");
				$result=mysqli_fetch_array($sql);
				?>
				<div class="col-md-8">
					<p class="h4">Order Number: #<?php echo $order_num; ?> </p>
					<p class="h5"> Room Number: #<?php echo $result['roomId']; ?></p>
					<p class="h5">From Date: <?php echo $result['FromDate']; ?></p>
					<p class="h5">To Date: <?php echo $result['ToDate']; ?></p>
					<p class="h5">Message: <?php echo $result['message']; ?></p>
				</div>
				<div class="col-md-4">
					<p class="h3">Booking Status</p>
					<?php   

					if ($result['payment'] !=0 && $result['Status']!=0) 
					{
						?>
						<p class="btn btn-success p-2">Confirmed By Admin</p>
						<?php
					}
					else
					{
						?>
						<p class="btn btn-primary p-2">Panding</p>
						<?php
					}
					?>
					
				</div>
			</div>

			<div class="row">
				<div class="alert alert-warning" role="alert">
				We will accept your booking after complete your payment.....!
			</div>
				<div class="col-md-12">
					<p class="h2 text-center">Invoice</p>
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
							<tr class="table-success">
								<td><?php echo $result['roomId']; ?></td>
								<td><?php echo $row['userName']; ?></td>
								<td><?php echo $result['FromDate']; ?></td>
								<td><?php echo $result['ToDate']; ?></td>
								<td>
									<?php  
									$c=0;
									$fdate=$result['FromDate'];
									$edate=$result['ToDate'];
									$datetime1 = date_create($fdate); 
									$datetime2 = date_create($edate); 
									$interval = date_diff($datetime1, $datetime2);
									$date= $interval->format('%a');
									echo $date;

									?>
								</td>
								<td><?php  
								$room_id=$result['roomId'];
								$sql1=$conn->query("SELECT * FROM rooms WHERE room_id='$room_id'");
								$rows=mysqli_fetch_array($sql1);
								$total_amount=$rows['price']*$date;
								echo $total_amount;
								?></td>
								<td><?php   
								$amount_with_vat=($total_amount+((2*$total_amount)/100));
								echo $amount_with_vat;
								?></td>
							</tr>
						</thead>
					</table>
				</div>
				<?php 
				$ubid=$result['id'];
				if (isset($_POST['paynow'])) 
				{
					$sqlu=$conn->query("UPDATE room_booking SET payment='$amount_with_vat' WHERE BookingNumber='$order_num'");
					if ($sqlu) 
					{
						echo "<script>alert('Thank you for your payment. We accept your payment. Please wait some minute for your conformation....');</script>";
						echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
					}
				}
				?>
				<div class=" col-md-4 float-right ml-4">
					<form method="post">
					<div>
						<input type="submit" name="paynow" value="Pay Now" class="btn btn-primary">
					</div>
				</form>
				</div>
				<div>
						<a href="index.php" class="btn btn-warning">Pay Later</a>
					</div>
				
				

				
				
				
			</div>

			<div class="col-md-12">
				<?php 
				include ('footer.php');
				?>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	</body>
	</html>
