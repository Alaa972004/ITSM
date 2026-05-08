<?php 


if (isset($_POST['submit_task'])) {
include "../classes/dbc.classes.php"; 

	// Grabing the data
	$ticket_id = $_POST['ticket_id'];
	$email = $_POST['email'];
	$Phone = $_POST['Phone'];
	$service_t = $_POST['service_t'];
	$info = $_POST['info'];
  $username_id = $_POST['username_id'];

// $uname = "admin";


// echo $ticket_id, $email, $Phone,   $info, $username_id, $service_t;

}


$userfind = new Connection();
$st1 = $userfind->openConnection()->prepare("SELECT id from users where username=:username");
$st1->bindParam(':username', $username_id);
$st1->execute();
$u_id = $st1->fetchColumn();





$submit_task = new Connection();
$stmt = $submit_task->openConnection()->prepare("insert into tasks values(Null,:t_id,:u_id,:email,:phone,:service,:info,1)");
$stmt->bindParam(':user_name', $uname);
  $stmt->execute(array(
    ':t_id' => $ticket_id,
    ':u_id' => $u_id,
    ':email' => $email,
    ':phone' => $Phone,
    ':service' => $service_t,
    ':info' => $info
));

$st2 = $submit_task->openConnection()->prepare("
UPDATE tickets
SET t_status = 1
WHERE id = $ticket_id;
  ");  
$st2->execute();

header("Location:../leader/tasks.php?sent_successfully");




 ?>
