<?php
session_start();

/* Initialize login attempts */
if(!isset($_SESSION['login_attempts'])){
    $_SESSION['login_attempts'] = 0;
}

if(!isset($_SESSION['lock_time'])){
    $_SESSION['lock_time'] = 0;
}

/* Lock duration in seconds */
$lock_duration = 60;

/* Max attempts */
$max_attempts = 5;

/* Check if user is locked */
if($_SESSION['login_attempts'] >= $max_attempts){

    $remaining = time() - $_SESSION['lock_time'];

    if($remaining < $lock_duration){

        die("Too many failed login attempts. Try again later.");

    } else {

        $_SESSION['login_attempts'] = 0;
    }
}

if (isset($_POST['login'])) {

    /* Grabing the data */
    $uname = trim($_POST['uname']);
    $upwd = trim($_POST['upwd']);

    /* Instantiate Classes */
    include "../classes/dbc.classes.php"; 
    include "../classes/login.classes.php"; 
    include "../classes/login-contr.classes.php";

    $login = new logincontr($uname, $upwd);

    /* Run login */
    $login->loginUser();
	
    /* Successful login */
    $_SESSION['login_attempts'] = 0;

    /* Redirect based on role */
    if ($_SESSION['role'] == "70") {

    header("Location:../admin/dashboard.php?error=none");

    } elseif ($_SESSION['role'] == "80") {

    header("Location:../leader/dashboard.php?error=none");

    } elseif($_SESSION['role'] == "90"){

    header("Location:../staff/tasks.php?error=none");

    } else {

    die("Role not detected");
    }

    exit();

} else {

    /* Failed attempt */
    $_SESSION['login_attempts']++;

    $_SESSION['lock_time'] = time();

    header("Location:../Login.php?error=invalidlogin");
    exit();
}

?>