<?php
session_start();

if(empty($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<html>
		<head>
		<title>Advanced IT Service Management</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link rel="stylesheet" href="css/responsiveslides.css">
	  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {

			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<body>
		<!--start-wrap-->

			<!--start-header-->
	<!-- 		<div class="header">
				<div class="wrap"> -->
				<!--start-logo-->
			<!-- 	<div class="logo">
					<a href="index.php" style="font-size: 30px;">Advanced IT Service Management</a>
				</div> -->
				<!--end-logo-->
				<!--start-top-nav-->
			<!-- 	<div class="top-nav">
					<ul>
						<li class="active"><a href="index.php">Home</a></li>

						<li><a href="contact.php">contact</a></li>
						<li><a href="#">Requst a new service!</a></li>
					</ul>
				</div>
				<div class="clear"> </div> -->
				<!--end-top-nav-->



  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="../index.html" class="logo">
              <h4>IT<span> Service Management</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="contact.php">contact Us</a></li>
              <li class="scroll-to-section">
                <div class="main-red-button"><a href="jobrequest.php">Requst a new service now!</a></div>
              </li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
		</div>
		    <div class="clear"> </div>
		   <div class="wrap">
		
<!-- Login form start -->

<!-- <form action="action_page.php" method="post">
  <div class="imgcontainer">
    <img src="images/login1.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form> -->

<!-- Login Form End -->


<div class="login-block">
	<form action="includes/Login.inc.php" method="post" id="contact-form" class="form-inline contact_box">
	<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <h1>Login</h1>
    <input type="text" value="" placeholder="Username" id="username" name="uname" required />
    <input type="password" value="" placeholder="Password" id="password"  name="upwd" required />
    <button type="submit" name='login' >Login</button>
</div>













	<div class="clear"> </div>
			</div>
	      <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="index.php">Home</a></li>

						<li><a href="contact.php">contact</a></li>
					 <li><a href="#">Requst service</a></li>

					</ul>
		   	</div>

		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>
