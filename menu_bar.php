<?php
include_once 'dbconn.php';
session_start();
?>
<!------CSS Link--------------->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--Google -Fonts-->
<link href='https://fonts.googleapis.com/css?family=Sintony:400,700&subset=latin-ext' rel='stylesheet' type='text/css'>

<!--Font-awsome-->
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> 


<div id="navbar mt-5">
	<div class="xs-menu-cont">
		<a id="menutoggle"><i class="fa fa-align-justify"></i> </a> 
		<nav class="xs-menu displaynone">
			<ul>
				<li class="active">
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="rooms.php">Rooms</a>
				</li>
				<li>
					<a href="feedbach.php">Feedback</a>
				</li>
				<li>
					<a href="gallery.php">Gallery</a> 
				</li>
				<li>
					<a href="about.php">About Hotel</a> 
				</li>
				<?php
				if (isset($_SESSION['userSession']))
				{
					?>
					<li>
						<div class="dropdown">
							<button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Profile
							</button>
							<div class="dropdown-menu" style="background-color: #ff7f50;" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="user_profile.php">Account</a>
								<a class="dropdown-item" href="booking_history.php">My Booking</a>
								
							</div>
						</div></li>
						<?php
					}
					?>

				</ul>

			</nav>
		</div>
		<nav class="menu">
			<ul style="margin-top: 5px;">
				<li class="active">
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="rooms.php">Rooms</a>
				</li>
				<li>
					<a href="feedbach.php">Feedback</a>
				</li>
				<li>
					<a href="gallery.php">Gallery</a> 
				</li>
				<li>
					<a href="about.php">About Hotel</a> 
				</li>
				<?php
				if (isset($_SESSION['userSession']))
				{
					?>
					<li class="float-right mr-5">
						<div class="dropdown">
							<button class="btn  dropdown-toggle text-white" style="background-color: #ff7f50;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Profile
							</button>
							<div class="dropdown-menu float-right" style="background-color: #ff7f50;" aria-labelledby="dropdownMenuButton">
								<a style="background-color: #ff7f50;" class="dropdown-item" href="user_profile.php">Account</a>
								<a style="background-color: #ff7f50;" class="dropdown-item" href="booking_history.php">My Booking</a>
								<a style="background-color: #ff7f50;" class="dropdown-item" href="#"></a>
							</div>
						</div>
					</li>
					<?php
				}
				?>
			</ul> 

		</nav>

	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
				//responsive menu toggle
				$("#menutoggle").click(function() {
					$('.xs-menu').toggleClass('displaynone');

				});
				//add active class on menu
				//$('ul li').click(function(e) {
				//	e.preventDefault();
				//	$('li').removeClass('active');
				//	$(this).addClass('active');
				//});
			//drop down menu	
			$(".drop-down").hover(function() {
				$('.mega-menu').addClass('display-on');
			});
			$(".drop-down").mouseleave(function() {
				$('.mega-menu').removeClass('display-on');
			});
			
		});


	</script>