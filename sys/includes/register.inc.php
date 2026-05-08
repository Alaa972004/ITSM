<?php 


if (isset($_POST['reg'])) {

include "../classes/dbc.classes.php"; 

	// Grabing the data
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$new_password = $_POST['new_password'];
	$position = $_POST['position'];


$register = new Connection();
$st1 = $register->openConnection()->prepare("INSERT INTO users VALUES(Null,:position,:username,:email,:upassword);");
 $st1->bindParam(':position', $position);
 $st1->bindParam(':username', $fname);
 $st1->bindParam(':email', $email);
  $st1->bindParam(':upassword', $new_password);
$st1->execute();



header("Location:../admin/register.php?registerd_successfully");

}




 ?>