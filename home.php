<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
    
    <head>
        <title><?php echo $row['userEmail']; ?></title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        
    </head>
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 bg-dark">
                    <div class="row">
                        <div class="col-3">
                            <p class="text-white p-2"><i class="fas fa-user-tie"></i> <?php echo " ".$row['userName']; ?></p>
                        </div>
                        <div class="col-3">
                            
                        </div>
                        <div class="col-3">
                            
                        </div>
                        <div class="col-3">
                            <a class="float-right text-white p-2" href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Hi !!!<?php echo $row['userName']?>!</h1>
                </div>
            </div>
        
        </div>       
           
    </body>

</html>