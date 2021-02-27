
<?php
include_once 'dbconn.php';
if (isset($_POST['subscribe'])) 
{
 $s_email=$_POST['sub_email'];

 if (empty($s_email)) 
 {
     ?><script>

      alert("Please enter your email address...!");

  </script>
  <?php

}
else
{
   $sql=$conn->query("INSERT INTO subscriber (email) VALUES ('$s_email')");
   if ($sql) 
   {
       ?>
       <script>

      alert("Thank you for your Subscription...!");

  </script>

  <?php
  $s_email="";
   }
   else
   {
    ?>
       <script>

      alert("Something is worng...!");

  </script>
  <?php

   }
}
}        


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>			
 <footer class="new_footer_area bg_color">
    <div class="new_footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                        <p>Don’t miss any updates of our new templates and extensions.!</p>
                        <form class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                            <input type="text" name="sub_email" class="form-control memail" placeholder="Email">
                            <button class="btn btn_get btn_get_two" type="submit" name="subscribe">Subscribe</button>
                            <p class="mchimp-errmessage" style="display: none;"></p>
                            <p class="mchimp-sucmessage" style="display: none;"></p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Download</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Android App</a></li>
                            <li><a href="#">ios App</a></li>
                            <li><a href="#">Desktop</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">My tasks</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Term &amp; conditions</a></li>
                            <li><a href="#">Reporting</a></li>
                            <li><a href="#">Documentation</a></li>
                            <li><a href="#">Support Policy</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                        <div class="f_social_icon">
                            <a href="#" class="fab fa-facebook"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-linkedin"></a>
                            <a href="#" class="fab fa-pinterest"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bg">
            <div class="footer_bg_one"></div>
            <div class="footer_bg_two"></div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-7">
                    <p class="mb-0 f_400">© 2021 All rights reserved.</p>
                </div>
                <div class="col-lg-6 col-sm-5 text-right">
                    <p>Made with <i class="icon_heart"></i><a href="#">Ramzan Ali</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>


</body>
</html>