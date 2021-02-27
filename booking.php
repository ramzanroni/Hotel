<?php 
require_once 'class.user.php';
session_start();
$user = new USER();
if (isset($_SESSION['userSession'])) 
{
	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:userid");
	$stmt->execute(array(":userid"=>$_SESSION['userSession']));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	require_once 'dbconn.php';
	$sql=$conn->query("SELECT * FROM rooms");
	if (isset($_POST['submit'])) 
	{
   $fromdate=$_POST['fromdate'];	
   $todate=$_POST['todate']; 
   $message=$_POST['message'];
   $useremail=$_SESSION['email'];
   $status=0;
   $roomid=$_GET['room_id'];
   $bookingno=mt_rand(100000000, 999999999);
   $ret="SELECT * FROM room_booking where ('$fromdate' BETWEEN date(FromDate) and date(ToDate) || '$todate' BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN '$fromdate' and $todate) and   roomId='$roomid'";
   $result=$conn->query($ret);
   $rowCount=$result->num_rows;
   if ($rowCount==0) 
   {
    $sql1="INSERT INTO  room_booking(BookingNumber, userEmail,roomId,FromDate,ToDate,message,Status) VALUES('$bookingno','$useremail','$roomid','$fromdate','$todate','$message','$status')";
    $result1=$conn->query($sql1);
    $lastInsertId=$conn->insert_id;
    if ($lastInsertId) 
    {
     echo "<script>alert('Booking successfull.');</script>";
     $_SESSION['roomid']=$roomid;
      $_SESSION['email']=$useremail;
      $_SESSION['BookingNumber']= $bookingno;

        echo "<script type='text/javascript'> document.location = 'my-booking.php?roomid=$roomid'; </script>";

   }
   else
   {
     echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script type='text/javascript'> document.location = 'rooms.php'; </script>";
   }
 }
 else
 {
  echo "<script>alert('Room already booked for these days...!');</script>"; 
}

}	
}
else
  header("Location: login.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hotel Reservation || Booking Room</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
  <div  class="container">
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
      <div class="col-md-6">
        <div class="shadow p-3 mb-5 bg-white rounded mt-2">
          <form method="post">
            <fieldset>
              <h3 class="text-center shadow-sm p-3 mb-5 bg-info rounded">Booking Here</h3>
              <div class="form-group">
                <label>From Date:</label>
                <input type="date" class="form-control" name="fromdate" placeholder="From Date" required>
              </div>
              <div class="form-group">
                <label>To Date:</label>
                <input type="date" class="form-control" name="todate" placeholder="To Date" required>
              </div>
              <div class="form-group">
                <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-success"  name="submit" value="Book Now">
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="shadow p-3 mb-5 bg-white rounded mt-2">
          <?php  

          $roomid=$_GET['room_id'];
          $sql_r=$conn->query("SELECT * FROM rooms");
          $row_r=mysqli_fetch_array($sql_r);
          

          ?>
          <div class="card" style="width: 32rem;">
            <img class="img-thumbnail" src="admin/user_images/<?php echo $row_r['photo'];  ?>">
            <div class="card-body">
              <p class="card-title h4 text-center"><?php echo $row_r['room_cat']; ?></p>
              <p class="card-text text-center">Facility: <?php echo $row_r['facility']; ?></p>
                <p class="text-center"><i class="fas fa-bed text-danger"></i> - <?php echo $row_r['no_bed']; ?></p>
                <p class="text-center"><?php echo $row_r['bedtype']; ?>&nbsp; Bed</p>
                <p class="text-center p-1" style="background-color: #ff7f50;"><?php echo "Price: ".$row_r['price']." $ per/night"; ?></p>
            </div>
          </div>
          <?php
          ?>
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