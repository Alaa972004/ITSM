<?php
session_start();

if(empty($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<html>

<head>

<title>Advanced IT Service Management</title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="assets/css/check.css">
<link rel="stylesheet" href="assets/css/animation.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

<script src="assets/js/jquery.js"></script>
<script src="assets/js/owl.carousel.js"></script>
<script src="assets/js/animation.js"></script>

<script>

$(function(){

$("#submit").click(function(){

var code = $("#code").val();

if(code == ""){

alert("Please Enter Trace Code");
return false;

}

});

});

</script>

</head>

<body>

<?php if(isset($_SESSION['trace_number'])): ?>

<?php

include_once 'classes/dbc.classes.php';

$database = new Connection();

$stmt = $database->openConnection()->prepare("SELECT * FROM tickets WHERE id = :id");

$trace_id = (int)$_SESSION['trace_number'];

$stmt->bindParam(':id', $trace_id);

$stmt->execute();

$data = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div class="main">

<div class="container">

<div class="header">

<h2>Ticket Information</h2>

</div>

<div class="content">

<h4 class="par" name="ti_id">
<?php echo (int)$data['id']; ?>
</h4>

<h4 class="par_view">
<?php echo htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8'); ?>
</h4>

<h4 class="par_view">
<?php echo htmlspecialchars($data['company'], ENT_QUOTES, 'UTF-8'); ?>
</h4>

<h4 class="par_view">
<?php echo htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8'); ?>
</h4>

<h4 class="par_view">
<?php echo htmlspecialchars($data['phone'], ENT_QUOTES, 'UTF-8'); ?>
</h4>

<h4 class="par_view">
<?php echo htmlspecialchars($data['service'], ENT_QUOTES, 'UTF-8'); ?>
</h4>

<h4 class="par_view">
<?php echo htmlspecialchars($data['location'], ENT_QUOTES, 'UTF-8'); ?>
</h4>

<h4 class="par_view">
<?php echo htmlspecialchars($data['info'], ENT_QUOTES, 'UTF-8'); ?>
</h4>

<?php

if ($data['t_status'] == 0) {

echo "<h4 class='pending'>Pending</h4>";

} elseif($data['t_status'] == 1) {

echo "<h4 class='working'>Working</h4>";

} elseif($data['t_status'] == 2) {

echo "<h4 class='completed'>Completed</h4>";

}

?>

<form action="includes/rating.inc.php" method="POST">

<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

<input type="hidden" id="random" name="rate_ticketid"
value="<?php echo (int)$data['id']; ?>">

<input type="hidden" id="random" name="rate_company"
value="<?php echo htmlspecialchars($data['company'], ENT_QUOTES, 'UTF-8'); ?>">

<input type="hidden" id="random" name="rate_service"
value="<?php echo htmlspecialchars($data['service'], ENT_QUOTES, 'UTF-8'); ?>">

<input class="set" type="email" id="lname" name="email"
placeholder="<?php echo 'Your Current Email Is : ' . htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8'); ?>" required>

<button type="submit" name="submit" class="button">
Submit Rating
</button>

</form>

</div>

</div>

</div>

<?php else: ?>

<div class="main">

<div class="container">

<div class="header">

<h2>Trace Ticket</h2>

</div>

<div class="content">

<form action="includes/check.inc.php" method="POST">

<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

<input type="text" id="code" name="code" placeholder="Enter Trace Code">

<button type="submit" name="submit" id="submit" class="button">
Trace
</button>

</form>

</div>

</div>

</div>

<?php endif; ?>

</body>

</html>