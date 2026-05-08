<?php 



Class login extends Connection {


protected function getUser($trace_number){
 $database = new Connection();
  $stmt = $database->openConnection()->prepare("SELECT * FROM tickets WHERE ticket_code = :trace_number ;");
 $stmt->bindParam(':trace_number', $trace_number);
  $stmt->execute();


if ($stmt == false ) {
header("location:../trace.php?error=querynotworking");
}

if ($stmt->rowCount() == 0) {
    $stmt = null;
header("location:../trace.php?error=ticketnotfound");
    // echo("usernotfound");
  exit();
}


// $upwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $hash2 = password_hash($upwdHashed[0]["trace_number"], PASSWORD_DEFAULT);
// $checkPwd = password_verify($trace_number, $hash2);



// if ($checkPwd == false) {
//     $stmt = null;
// header("Location:../trace.php?error=wrong");
// exit();


// }

$stmt = $database->openConnection()->prepare("SELECT * FROM tickets WHERE ticket_code = :trace_number ;");
 $stmt->bindParam(':trace_number', $trace_number);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    $stmt = null;
header("Location:../trace.php?error=ticketnotfound");
exit();
}

$user = $stmt->fetchAll(PDO::FETCH_ASSOC);



session_start();

foreach ($user as $row => $link) {
    $_SESSION['trace_number'] = $user[0]["ticket_code"];

  }


}




}



?>