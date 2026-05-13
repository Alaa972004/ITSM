<?php
session_start();

if(empty($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<html>

<head>
<title>Advanced IT Service Management</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/responsiveslides.css">

<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
rel="stylesheet">

</head>

<body>

<header class="header-area header-sticky">

<div class="container">
<div class="row">
<div class="col-12">

<nav class="main-nav">

<a href="index.php" class="logo">
<h4>IT<span> Service Management</span></h4>
</a>

<ul class="nav">

<li><a href="index.php">Home</a></li>

<li><a href="contact.php" class="active">Contact Us</a></li>

<li>
<div class="main-red-button">
<a href="jobrequest.php">Request Service</a>
</div>
</li>

</ul>

</nav>

</div>
</div>
</div>

</header>

<div class="wrap">

<div class="contact">

<div class="contact-form">

<h2>Contact Us</h2>

<form method="POST">

<input type="hidden" name="csrf_token"
value="<?php echo $_SESSION['csrf_token']; ?>">

<div>

<label>NAME</label>

<input 
type="text" 
name="name" 
placeholder="Enter your name"
required
minlength="3">

</div>

<div>

<label>E-MAIL</label>

<input
type="email"
name="email"
placeholder="Enter your email"
required>

</div>

<div>

<label>MOBILE.NO</label>

<input
type="tel"
name="mobile"
placeholder="07XXXXXXXX"
required
minlength="10"
maxlength="10">

</div>

<div>

<label>SUBJECT</label>

<textarea
name="subject"
placeholder="Write your message here..."
required
minlength="10"></textarea>

</div>

<div>

<input type="submit" value="Submit">

</div>

</form>

</div>

</div>

</div>

</body>

</html>