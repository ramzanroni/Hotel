<?php
session_start();
require_once 'dbconn.php';
if (!isset($_SESSION['username'])) 
{
	header("Location: index.php");
}
$user= $_SESSION['username'];
$sql=$conn->query("SELECT * FROM rooms");
$room=$sql->num_rows;

$sql1=$conn->query("SELECT * FROM tbl_users");
$user_c=$sql1->num_rows;
$av_room=0;
while ($row=mysqli_fetch_array($sql)) 
{
    if ($row['book']=='false') {
        $av_room++;
    }
}

$sql4=$conn->query("SELECT * FROM income ORDER BY id DESC LIMIT 30");
$total_amount=0;
while ($res=mysqli_fetch_array($sql4)) 
{
    $total_amount=$total_amount+ $res['amount'];
}

$sql3=$conn->query("SELECT * FROM subscriber");
$subscriber=$sql3->num_rows;
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

            <div class="row">
            	<div class="col-md-3">
            		<div class="btn btn-danger  m-2 p-3">
            			<p class="text-white">Number of Room</p>
                        <p class="text-white text-center"><?php echo $room; ?></p>
            		</div>
            	</div>
            	<div class="col-md-3 ">
            		<div class="btn btn-primary m-2 p-3">
            			<p class="text-white">Number of User</p>
                        <p class="text-white text-center"><?php echo $user_c; ?></p>
            		</div>
            	</div>
            	<div class="col-md-3">
            		<div class="btn btn-warning m-2 p-3">
            			<p class="text-white">Income Last 30 Days</p>
                         <p class="text-white text-center"><?php echo $total_amount; ?></p>
            		</div>
            	</div>
            	<div class="col-md-3">
            		<div class="btn btn-info m-2 p-3">
            			<p class="text-white">Number of subscriber</p>
                        <p class="text-white text-center"><?php echo $subscriber; ?></p>
            		</div>
            	</div>
            </div>
            

            <div class="line"></div>

            <img width="100%" height="400px"  src="user_images/home.jpg">

            <div class="line"></div>

            <h3>Lorem Ipsum Dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>

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