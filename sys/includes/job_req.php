<?php 


if (isset($_POST['submit_t'])) {
include "../classes/dbc.classes.php"; 

  // Grabing the data
  $fname = $_POST['fname'];
  $cname = $_POST['cname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $service = $_POST['service'];
  $location = $_POST['location'];
  $subject = $_POST['subject'];
  $random_id = $_POST['random_id'];

}


$submit_ticket = new Connection();

  $st = $submit_ticket->openConnection()->prepare("insert into tickets values(Null,:fname,:cname,:email,:phone,:service,:location,:subject,0,:random_id)");
  $st->execute(array(
    ':fname' => $fname,
    ':cname' => $cname,
    ':email' => $email,
    ':phone' => $phone,
    ':service' => $service,
    ':location' => $location,
    ':subject' => $subject,
    ':random_id' => $random_id
));

header("Location:../jobrequest.php?Requsest_recived_successfully");



 ?>
