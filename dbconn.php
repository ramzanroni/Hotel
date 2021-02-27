<?php
 $conn =new mysqli("localhost", "root", "", "for_hotel"); 
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

