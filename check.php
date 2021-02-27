<?php  
 include_once 'dbconn.php';
 $sql= $conn->query(" SELECT * FROM  room_booking WHERE id='1'");
 $row=mysqli_fetch_array($sql);
 $c=0;
 $fdate=$row['FromDate'];
 $edate=$row['ToDate'];
 $datetime1 = date_create($fdate); 
$datetime2 = date_create($edate); 
 $interval = date_diff($datetime1, $datetime2);
 $date= $interval->format('%a');
 echo $date;
?>