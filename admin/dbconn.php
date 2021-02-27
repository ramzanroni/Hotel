<?php
 $conn =new mysqli("localhost:3306", "ramzan_sa", "ramzan", "ramzan_hotel"); 
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>