<?php
require_once 'dbconn.php';
session_start();

error_reporting(0);
if (!isset($_SESSION['username'])) 
{
	header("Location: index.php");
}
$user= $_SESSION['username'];

if (isset($_POST['submit'])) 
{
  $room_type=$_POST['r_type'];
  
  $num_room=$_POST['N_room'];
  
  $num_bed=$_POST['N_bed'];
  
  $bed_type=$_POST['bed_type'];
  
  $room_fec=$_POST['fec_room'];
  
  $price=$_POST['price'];
  
  $imgFile = $_FILES['r_image']['name'];
  $tmp_dir = $_FILES['r_image']['tmp_name'];
  $imgSize = $_FILES['r_image']['size'];
  
  if (empty($room_type)) 
  {
    $errMSG="error";
    ?>
    <div class="alert alert-danger" role="alert">
      Please enter the room type..!
    </div>
    <?php
  }
  else if (empty($num_room)) 
  {
    $errMSG="error";
    ?>
    <div class="alert alert-danger" role="alert">
      Please enter the number of room....! 
    </div>
    <?php
  }
  else if (empty($num_bed)) 
  {
    $errMSG="error";
    ?>
    <div class="alert alert-danger" role="alert">
      Please enter the number of bed....!
    </div>
    <?php
  }
  else if (empty($bed_type)) 
  {
    $errMSG="error";
    ?>
    <div class="alert alert-danger" role="alert">
      Please enter the bed type....!
    </div>
    <?php
  }
  else if (empty($room_fec)) 
  {
    $errMSG="error";
    ?>
    <div class="alert alert-danger" role="alert">
      Please enter the room fecility....!
    </div>
    <?php
  }
  else if (empty($imgFile)) 
  {
    $errMSG="error";
    ?>
    <div class="alert alert-danger" role="alert">
      Please enter the room image....!
    </div>
    <?php
  }
  else if (empty($price)) 
  {
    
    $errMSG="error";
    ?>
    <div class="alert alert-danger" role="alert">
      Please enter the room Price....!
    </div>
    <?php
  }
  else
  {
    $upload_dir = 'user_images/';
    
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
    $userpic = rand(1000,1000000).".".$imgExt;

    if(in_array($imgExt, $valid_extensions))
    {           

      if($imgSize < 9000000)              
      {
        move_uploaded_file($tmp_dir,$upload_dir.$userpic);
      }
      else
      {
        $errMSG = "Sorry, your file is too large.";
      }
    }
    else
    {
      $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
    }

  }
  if (!isset($errMSG)) 
  {
    $available=$num_room;
    $booked=0;
    
    $query="INSERT INTO room_category (roomname, room_qnty, available, booked, no_bed, bedtype,   facility, price, photo) values ('$room_type','$num_room', '$available', '$booked', '$num_bed', '$bed_type', '$room_fec', '$price', '$userpic')";
    $result=$conn->query($query);

    $data=$conn->query("SELECT * FROM room_category WHERE roomname='$room_type'");
    $row_data=mysqli_fetch_array($data);
    $room_cat_num=$row_data['id'];
    if ($result===true) {
      for($i=0; $i<$num_room; $i++)
    {
      $query2=$conn->query("INSERT INTO rooms (room_cat, room_cat_id, no_bed, bedtype, facility, price, photo,  book) VALUES ('$room_type', '$room_cat_num', '$num_bed', '$bed_type', '$room_fec', '$price', '$userpic', 'false')");

    }

    if ($query2===true) {
      ?>
      <script type="text/javascript">
        alert("Add Room Successfully.....!");
      </script>
      <?php
    }
    else{
      ?>
      <script type="text/javascript">
        alert("Something is worng.....!");
      </script>
      <?php
    }
    }
    
  }
  else
  {
    echo "Undone";
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

    <div class="row">
      <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Room Type Name</label>
            <input type="text" name="r_type" class="form-control">
          </div>
          <div class="form-group">
            <label>Number of Room</label>
            <select class="form-control" name="N_room">
              <option>Select Room Quantity</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>
          <div class="form-group">
            <label>Enter The Number of Bed</label>
            <select class="form-control" name="N_bed">
              <option>Select Number of Bed</option>
              <option value="1">1</option>
              <option value="2">2</option>
            </select>
          </div>
          <div class="form-group">
            <label>Bed Type</label>
            <select name="bed_type" class="form-control">
              <option>Select Bed Type</option>
              <option class="Single">Single</option>
              <option class="Double">Double</option>
            </select> 
          </div>
          <div class="form-group">
            <label>Fecility</label>
            <textarea name="fec_room" class="form-control" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label>Enter Your Room Image</label><br>
            <input type="file" name="r_image" accept="image/*" />
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Insert Room" class="form-control btn btn-primary">
          </div>
        </form>
      </div>
    </div>

    <div class="line"></div>



    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
        });
      });
    </script>
  </body>

  </html>