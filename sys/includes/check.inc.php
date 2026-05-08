<?php 


if (isset($_POST['rates'])) {
include "../classes/dbc.classes.php"; 

  // Grabing the data
  $rate_ticketid = $_POST['rate_ticketid'];
  $rate_company = $_POST['rate_company'];
  $rate_service = $_POST['rate_service'];
  $star = $_POST['rate'];

$submit_rate = new Connection();

  $st = $submit_rate->openConnection()->prepare("insert into rate values(Null,:rate_ticketid,:rate_company,:rate_service,:rate)");
  $st->execute(array(
    ':rate_ticketid' => $rate_ticketid,
    ':rate_company' => $rate_company,
    ':rate_service' => $rate_service,
    ':rate' => $star
));

header("Location:../index.php?rated_successfully");

}elseif (isset($_POST['Compliant'])) {
  include "../classes/dbc.classes.php"; 

  // Grabing the data
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $Message = $_POST['Message'];


$submit_comp = new Connection();

  $st = $submit_comp->openConnection()->prepare("insert into compliants values(Null,:fname,:email,:subject,:Message,Null)");
  $st->execute(array(
    ':fname' => $fname,
    ':email' => $email,
    ':subject' => $subject,
    ':Message' => $Message
));

header("Location:../index.php?compliant_sent_successfully");

}else{

  header("Location:../check.php?error");

}


 ?>
