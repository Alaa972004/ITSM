<<<<<<< HEAD
```php
<html>
<head>
<title>Advanced IT Service Management</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/responsiveslides.css">

<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="js/responsiveslides.min.js"></script>

<script>
$(function () {

    $("#slider1").responsiveSlides({
        maxwidth: 1600,
        speed: 600
    });

});
</script>

</head>

<body>

<!-- Header -->

<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">

<div class="container">
<div class="row">
<div class="col-12">

<nav class="main-nav">

<a href="../index.html" class="logo">
<h4>IT<span> Service Management</span></h4>
</a>

<ul class="nav">

<li class="scroll-to-section">
<a href="index.php">Home</a>
</li>

<li class="scroll-to-section">
<a href="contact.php">contact Us</a>
</li>

<li class="scroll-to-section">
<div class="main-red-button">
<a href="jobrequest.php" class="active">
Requst a new service now!
</a>
</div>
</li>

</ul>

<a class='menu-trigger'>
<span>Menu</span>
</a>

</nav>

</div>
</div>
</div>

</header>

<div class="clear"></div>

<div class="wrap">

<div class="contact">

<div class="sections2 groups">

<?php
$random = "TCK-" . strtoupper(substr(md5(uniqid()), 0, 8));

?>

<h3>Request a new service</h3>

<div class="jobrequest">

<form action="includes/job_req.php" method="post">

<label for="fname">Full Name</label>

<input type="text" id="fname" name="fname" placeholder="Your name..">

<label for="lname">Company name</label>

<input type="text" id="lname" name="cname" placeholder="Company name..">

<label for="lname">email</label>

<input class="input1" type="email" id="sa" name="email" placeholder="example@example.com" required>

<label for="lname">phone number</label>

<input class="input1" type="phone" id="na" name="phone" placeholder="+962 ......." required>

<label for="service">choose a service</label>

<select id="service" name="service">

<option value="network services">network services</option>

<option value="cloud services">cloud services</option>

<option value="web development">web development</option>

<option value="technical support">technical support</option>

<option value="network security">network security</option>

<option value="monitoring systems">monitoring systems</option>

<option value="maintenance">maintenance</option>

<option value="others">others it services</option>

</select>

<!-- Location -->

<label for="Location">Location</label>

<select id="service" name="location">

<option value="Amman">Amman</option>

<option value="Zarqa">Zarqa</option>

<option value="Irbid">Irbid</option>

<option value="Madaba">Madaba</option>

<option value="As Salt">Balqa Al Salt</option>

<option value="Mafraq">Mafraq</option>

<option value="Petra">Petra</option>

<option value="Jarash">Jarash</option>

<option value="Karak">Karak</option>

<option value="Aqaba">Aqaba</option>

<option value="Ajloun">Ajloun</option>

<option value="Maan">Ma'an</option>

<option value="Tafila">Tafila</option>

</select>

<!-- End Location -->

<label for="subject">
Additional information (feel free to write)
</label>

<textarea id="subject" name="subject" placeholder="Describe your needs.." style="height:200px"></textarea>

<input type="hidden" id="random" name="random_id" value="<?php echo $random; ?>">

<input class="input2" type="submit" name="submit_t" value="Submit">

<input class="input2" type="reset" value="Cancel">

</form>

</div>

<!-- End Job Request Form -->

<div class="clear"></div>

</div>

<div class="clear"></div>

</div>

<div class="clear"></div>

<div class="footer">

<div class="wrap">

<div class="footer-left">

<ul>

<li><a href="index.php">Home</a></li>

<li><a href="contact.php">contact</a></li>

<li><a href="#">Requst service</a></li>

</ul>

</div>

<div class="clear"></div>

</div>

</div>

</body>
</html>
```
=======
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
              <li class="scroll-to-section"><a href="index.php" >Home</a></li>
              <li class="scroll-to-section"><a href="contact.php">contact Us</a></li>
              <li class="scroll-to-section">
                <div class="main-red-button"><a href="jobrequest.php"class="active">Requst a new service now!</a></div>
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
		   	<div class="contact">
		   	<div class="sections2 groups">

<?php 
    $arr = str_split('ABCDEFGHIJKLMNOP'); // get all the characters into an array
    shuffle($arr); // randomize the array
    $arr = array_slice($arr, 0, 6); // get the first six (random) characters out
    $str = implode('', $arr); // smush them back into a string
    $num = rand(112, 500);
    $random = $num.$str;

 ?>
		<h3>Request a new service</h3>

<div class="jobrequest">
  <form action="includes/job_req.php" method="post">
    <label for="fname">Full Name</label>
    <input type="text" id="fname" name="fname" placeholder="Your name..">

    <label for="lname">Company name</label>
    <input type="text" id="lname" name="cname" placeholder="Company name..">

    <label for="lname">email</label>
    <input class="input1" type="email" id="sa" name="email" placeholder="example@eample.com" required>

    <label for="lname">phone number</label>
    <input class="input1" type="phone" id="na" name="phone" placeholder="+962 ......." required>

    <label for="service">choose a service</label>
    <select id="service" name="service">
      <option value="network services">network services</option>
                  <option value="cloud services">cloud services</option>
            <option value="web development">web development</option>
                  <option value="technical support">technical support</option>
      <option value="network security">network security</option>
            <option value="monitoring systems">monitoring systems</option>
      <option value="maintenance ">maintenance</option>
            <option value="others">others it services</option>
    </select>


                        <!--Location-->
	<label for="Location ">Location </label>
    <select id="service" name="location">
      <option value=" Amman	">Amman	</option>
                  <option value="Zarqa">Zarqa</option>
            <option value="Irbid">Irbid</option>
                  <option value="Madaba">Madaba</option>
      <option value="As Salt">Balqa	Al Salt</option>
            <option value="Mafraq">Mafraq</option>
      <option value="Petra ">Petra</option>
            <option value="Jarash">Jarash</option>
                        <option value="Karak">Karak</option>
            <option value="Aqaba">Aqaba</option>
	  <option value="Mafraq">Mafraq</option>
	  	  <option value="Jerash">Jerash</option>
	  	<option value="Ajloun">Ajloun</option>
	  	<option value="Maan">Ma'an</option>
	  	  <option value="Tafila">Tafila</option>
    </select>
                   <!--Location-->

				   
    <label for="subject">Additional information (feel free to write)</label>
    <textarea id="subject" name="subject" placeholder="Describe your needs.." style="height:200px"></textarea>
      <input type="hidden" id="random" name="random_id" value="<?php echo $random; ?>">

    <input class="input2" type="submit" name="submit_t" onclick="myFunction()" value="Submit" >
    <input class="input2" type="reset" value="Cancel" >
  </form>
</div>



<!-- end of job request form -->

<script>
function myFunction() {
  alert("Your Ticket Number is :" + "<?php echo $random; ?>" + "\n"+"Please Save it !");
}
</script>


			  	 <div class="clear"> </div>
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
>>>>>>> 7fd54827e2dd855f485b9c0cf05fbe1a06e6c5d8
