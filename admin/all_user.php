<?php
require_once 'dbconn.php';
session_start();

error_reporting(0);
if (!isset($_SESSION['username'])) 
{
	header("Location: index.php");
}
$user= $_SESSION['username'];
  if (isset($_GET['del'])) 
  {
      $sql=$conn->query("DELETE FROM tbl_users WHERE userID=".$_GET['del']);
      header("Location: all_user.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Info</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <table class="table table-striped table-hover">
          <h2>User information</h2>
          <thead class="text-center" style="background: #5d66e3;">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">User Name</th>
              <th scope="col"> Email Address</th>
              <th scope="col">User Condition</th>
              <th scope="col">Delete User</th>
            </tr>
          </thead>
          <?php 
            $res=$conn->query("SELECT * FROM tbl_users");
            while ($row=mysqli_fetch_array($res)) {
              ?>
                <tr class="text-center">
                  <td >
                    <?php echo $row['userID']; ?>
                      
                    </td>
                  <td>
                    <?php echo $row['userName']; ?>
                  </td>
                  <td>
                    <?php echo $row['userEmail']; ?>
                  </td>
                  <td>
                    <?php
                    if ($row['userStatus']=='Y') 
                    {
                      echo "Active";
                    }
                    else
                    {
                      echo "Unactive";
                     
                    }
                    ?>
                  </td>
                  <td>
                    <a href="?del=<?php echo $row['userID'];?>" onclick="return confirm('Are you sure.... ??')"><i class="fas fa-user-times text-danger"></i></a>
                  </td>
                </tr>

              <?php
            }
          ?>
        </table>
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