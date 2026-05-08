<?php 

if (isset($_POST['login'])) {

	// Grabing the data
	$uname = $_POST['uname'];
	$upwd = $_POST['upwd'];


//instantiate Classes

include "../classes/dbc.classes.php"; 
include "../classes/login.classes.php"; 
include "../classes/login-contr.classes.php";

$login = new logincontr($uname,$upwd);


// Runing handler and user login 

$login->loginUser();

session_start();

//Going back to front page 


if ($_SESSION['role'] == 70) {
header("Location:../admin/dashboard.php?error=none");
} elseif ($_SESSION['role'] == 80) {
header("Location:../leader/dashboard.php?error=none");
}elseif($_SESSION['role'] == 90){
header("Location:../staff/tasks.php?error=none");

}else {
header("login.php?check_your_info");

}


}





?>