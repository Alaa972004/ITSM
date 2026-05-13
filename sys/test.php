<?php 
session_start();
if(isset($_SESSION['uname'])){
include "classes/dbc.classes.php"; 
$userfind = new Connection();
$stmt = $userfind->openConnection()->prepare("SELECT * FROM users WHERE username = :user_name AND user_password = :user_password;");
$uname = "admin";
$upwd = "admin";
 $stmt->bindParam(':user_name', $uname);
  $stmt->bindParam(':user_password', $upwd);
$stmt->execute();
  // $result = $stmt->fetchColumn();

 //  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

 // $report_details = json_encode($result,JSON_PRETTY_PRINT);
 //    echo($report_details[0]['user_name']);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($result['u_role']);
// print("\n");


// foreach ($result as $row => $link) {
//   $test =  $link['u_role'];
//   }

// echo $test;

 	//echo $_SESSION['uname'];
 	//echo $_SESSION['upwd'];
 	 //	echo $_SESSION['role'];
}

?>