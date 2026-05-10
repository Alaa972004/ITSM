<?php session_start(); ?>

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
<?php if(isset($_SESSION['trace_number'])): ?>

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

 include_once 'classes/dbc.classes.php';
 $tr = $_REQUEST['code'];
$database = new Connection();
$stmt = $database->openConnection()->prepare("SELECT * FROM tickets WHERE ticket_code = :trace_number;");
 $stmt->bindParam(':trace_number', $tr);
$stmt->execute();

 ?>

 <?php
 $sn=1;
$data = $stmt->fetch(PDO::FETCH_ASSOC);
   
   ?>
<div>


  <form class="view_form" id="form1" method="POST" action="includes/check.inc.php">
    <span><h2 class='set'>Ticket Status</h2></span><br>
    <h4>Ticket ID </h4>
        <h4 class="par" name="ti_id"><?php echo $data['id']; ?> </h4>
    <br>
    <label for="fname"><b>Sender Name</b></label>
 <h4 class="par_view">  <?php echo $data['name']; ?> </h4>

    <label for="lname"><b>Company Name</b></label>
   <h4 class="par_view"><?php echo $data['company']; ?> </h4>

    <label for="lname"><b>Email</b></label>
   <h4 class="par_view"><?php echo $data['email']; ?> </h4>


    <label for="lname"><b>Phone No.</b></label>
   <h4 class="par_view"><?php echo $data['phone']; ?></h4>

    <label for="lname"><b>Requsted Service</b></label>
   <h4 class="par_view"><?php echo $data['service']; ?></h4>

    <label for="lname"><b>Location</b></label>
   <h4 class="par_view"><?php echo $data['location']; ?></h4>

   <label for="lname"><b>Information</b></label>
   <h4 class="par_view" ><?php echo $data['info']; ?></h4>

   <label for="lname"><b>Status of Ticket</b></label>
   <?php 
if ($data['t_status'] == 0) {
    echo "<h4 class='par_view' style='color: red;'>Awaiting ...</h4>";
}elseif($data['t_status'] == 1) {
    echo "<h4 class='par_view' style='color: blue;'>Under Processing</h4>";
}elseif($data['t_status'] == 2){
    echo "<h4 class='par_view' style='color: green;'>Completed</h4>";
}else{
    echo "<h4 class='par_view'>None</h4>";
}
  ?>

      <input type="hidden" id="random" name="rate_ticketid" value="<?php echo $data['id']; ?>">
        <input type="hidden" id="random" name="rate_company" value="<?php echo $data['company']; ?>">
      <input type="hidden" id="random" name="rate_service" value="<?php echo $data['service']; ?>">

     <label for="lname"><b>Rate The Service</b></label><br>

  <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
  </div>
        <input type="submit" name="rates" value="submit Your Rate">

<br><br>

</form>
     <label for="lname"><b>Or Submit A Compliant</b></label><br>

<button id="show">Start A Compliant</button>	
<button id="rate_s">Rate The Service</button>	




<!-- compliant form start -->



 <form class="comp" id="comp" method="POST" action="includes/check.inc.php">
    <span><h2 class='set'>Submit A Compliant</h2></span><br>
 
    <label for="fname"><b>Full Name</b></label>
    <input class="set" type="text" id="fname" name="fname" placeholder=''>

    <label for="lname"><b>E-mail</b></label>
    <input class="set" type="email" id="lname" name="email" placeholder="<?php echo "Your Current Email Is :".$data['email']; ?>" required>

    <label for="lname"><b>Subject</b></label>
    <input class="set" type="text" id="lname" name="subject" onChange="onChange()" placeholder="Enter your New Password..." required>


    <label for="lname"><b>Message</b></label>
     <textarea type="text" style="height:300px; width: 100%;" class="form-control input_box"  id = "cl5" name="Message" placeholder="Feel free to write ..." value="None"></textarea>


        <input type="submit" name="Compliant" value="Submit A compliant">

        <br><br>
  </form>




</div>


    <br>


   <!-- end page -->

<script>
$(document).ready(function(){
    $("#comp").hide();
    $("#rate_s").hide();
  });
  $("#show").click(function(){
    $("#comp").show();
    $("#form1").hide();
    $("#rate_s").show();
  });
    $("#rate_s").click(function(){
    $("#form1").show();
    $("#comp").hide();
  });
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







<?php else : ?>




<center><h1> You Must Enter A Ticket Number First</h1></center>



<?php endif; ?>


	</body>
</html>
