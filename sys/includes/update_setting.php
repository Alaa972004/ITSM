<?php 
session_start();
if (isset($_POST['update_set'])) {

include "../classes/dbc.classes.php"; 

	// Grabing the data
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$new_password = $_POST['new_password'];
  $old_pass = $_SESSION['upwd'];
  $uname = $_SESSION['uname'];



}



$userfind = new Connection();
$st1 = $userfind->openConnection()->prepare("UPDATE users
SET username = :username, email = :email , user_password = $new_password
WHERE user_password= $old_pass AND username= :uname ;");
 $st1->bindParam(':uname', $uname);
 $st1->bindParam(':username', $fname);
 $st1->bindParam(':email', $email);
$st1->execute();



header("Location:../leader/setting.php?updated_successfully");

// session_unset();
// session_start();
if ($_SESSION['uname'] = $uname) {

$_SESSION['uname'] = $fname ;
$_SESSION['upwd'] = $new_password;
}

 ?>
