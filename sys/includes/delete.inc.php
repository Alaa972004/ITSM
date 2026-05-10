<?php 


if (isset($_REQUEST['id'])) {
include "../classes/dbc.classes.php"; 

  // Grabing the data
  $user_id = $_REQUEST['id'];

}


$delete_user = new Connection();

$st = $delete_user->openConnection()->prepare("DELETE FROM users WHERE id=:id;");
$st->bindParam(':id', $user_id);
  $st->execute();



header("Location:../admin/employee.php?user_got_deleted");



 ?>
