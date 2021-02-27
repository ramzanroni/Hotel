<?php 
session_start();
require_once 'dbconn.php';
if (!isset($_SESSION['username'])) 
{
	header("Location: index.php");
}
$user= $_SESSION['username'];

if (isset($_GET['checkout'])) 
{
	$checkout=$_GET['checkout'];
	
	$sql=$conn->query("UPDATE room_booking SET  Status='complete' WHERE BookingNumber='$checkout'");
	if($sql) 
	{
       echo "<script>alert('Checkout Successfully...!');</script>";

       echo "<script>window.location.replace('active_booking.php')</script>";
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Hotel Management System</title>
  <!-- Bootstrap CSS CDN -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style.css">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
       <?php

       include_once 'side_bar.php';
       ?>

       <!-- Page Content  -->
       <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="admin_logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="line"></div>

   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Search</span>
  </div>
  <input type="text" name="search_text" id="search_text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>
   
   <br />
   <div id="result"></div>
  

    <div style="clear: both;"></div>
          <!-- <div id="result"> -->
            	<table  class="table table-striped table-hover">
            		<thead style="background: #5d66e3;" >
            			<tr class="text-center">
            				<th>Room Number</th>
            				<th>Booking Number</th>
            				<th>Form Date</th>
            				<th>To Date</th>
            				<th>Check Out</th>
            			</tr>
            		</thead>
            		<?php 
            		$sql=$conn->query("SELECT * FROM  room_booking");
            			while ($row=mysqli_fetch_array($sql)) 
            			{
            				if ($row['Status']==1 && $row['payment'] !=0) 
            				{
            				
            					?>
            					 <tr class="text-center">
            						<td><?php echo $row['roomId'] ; ?></td>
            						<td><?php echo $row['BookingNumber'] ; ?></td>
            						<td><?php echo $row['FromDate'] ; ?></td>
            						<td><?php echo $row['ToDate'] ; ?></td>
            						<td><a class="btn btn-warning" href="active_booking.php?checkout=<?php echo $row['BookingNumber']?>">Check Out</a></td>
            					</tr>
            					<?php
            				}
            			}
            		?>
            	</table>
            <!-- /div>  -->
       <script>
$(document).ready(function()
{

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function()
 {
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

    </div>
</div>
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>

</html>