<?php

include "../classes/dbc.classes.php";
$fname = trim($_POST['fname']);
$email = trim($_POST['email']);
$new_password = trim($_POST['new_password']);
$confirm_password = trim($_POST['new_password_re']);
$position = $_POST['position'];

/* =========================
   PASSWORD VALIDATION
========================= */

// Password length validation
if(strlen($new_password) < 8){
    die("Password must be at least 8 characters");
}

// Confirm password validation
if($new_password !== $confirm_password){
    die("Passwords do not match");
}

/*
Password must contain:
- One uppercase
- One lowercase
- One number
- One special character
*/

if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@$!%*?&])[A-Za-z\\d@$!%*?&]{8,}$/', $new_password)){

    die("Weak password! Use uppercase, lowercase, number and special character.");
}

/* Hash password */
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

$register = new Connection();

$st1 = $register->openConnection()->prepare("INSERT INTO users VALUES(Null,:position,:username,:email,:upassword)");

$st1->bindParam(':position', $position);
$st1->bindParam(':username', $fname);
$st1->bindParam(':email', $email);
$st1->bindParam(':upassword', $hashed_password);

$st1->execute();

header("Location:../admin/register.php?registered_successfully");
exit();

?>