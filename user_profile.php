<?php 
require_once 'class.user.php';
session_start();
$user = new USER();
if (isset($_SESSION['userSession'])) {
    $stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:userid");
    $stmt->execute(array(":userid"=>$_SESSION['userSession']));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile || Hotel Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <?php
        include_once 'menu_bar.php';
                //include_once 'menu.php';
        ?>

        <div id="carouselExampleIndicators" class="carousel slide mt-2 aaa" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="height: 500px;" class="d-block w-100 " src="image/cover1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img style="height: 500px;" class="d-block w-100 " src="image/cover2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img style="height: 500px;" class="d-block w-100" src="image/cover3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 shadow p-3 mb-5 bg-white rounded mt-5">
               <div class="main-body">
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="image/userp.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                              <h4><?php echo $row['userName']; ?></h4>
                              <p class="text-secondary mb-1"><?php echo $row['userEmail']; ?></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                      <?php echo $row['userName']; ?>
                  </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                  <?php echo $row['userEmail']; ?>
              </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Phone</h6>
          </div>
          <div class="col-sm-9 text-secondary">
              <?php echo $row['phone']; ?>
          </div>
      </div>
      <hr>
  </div>
</div>
</div>
</div>
<a class="btn btn-primary" href="change_pass.php">Change Password</a>
</div>
</div>
<div class="col-md-2"></div>
</div>
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
<script type="text/javascript"> 
    $(function () {
       $('.toggle-menu').click(function(){
          $('.exo-menu').toggleClass('display');

      });

   });
</script>
