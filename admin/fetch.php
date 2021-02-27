<?php
//fetch.php
error_reporting(0);
include_once 'dbconn.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
 SELECT * FROM room_booking 
 WHERE BookingNumber LIKE '%".$search."%'
 OR  userEmail LIKE '%".$search."%' 
 OR roomId LIKE '%".$search."%' 
 ";
}
else
{

}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
  ?>
 <div class="table-responsive">
 <table  class="table table-striped table-hover">
 <thead style="background: #5d66e3;" >
 <tr>
 <th>Room Number</th>
 <th>Booking Number</th>
 <th>Form Date</th>
 <th>To Date</th>
 <th>Check Out</th>
 </tr>
 </thead>
 <?php
 while($row = mysqli_fetch_array($result))
 {
  if ($row['Status']==1 && $row['payment'] !=0) 
  {
?>
    

    <tr>
    <td><?php echo $row['roomId']; ?></td>
    <td><?php echo $row['BookingNumber']; ?></td>
    <td><?php echo $row['FromDate']; ?></td>
    <td><?php echo $row['ToDate']; ?></td>
    <td><a class="btn btn-warning" href="active_booking.php?checkout=<?php echo $row['BookingNumber']?>">Check Out</a></td>
   
  </tr>
 

 <?php 
}
}
//echo $output;
}
else
{
 echo 'Data Not Found';
}

?>