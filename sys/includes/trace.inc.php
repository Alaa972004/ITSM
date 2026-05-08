<?php 

if (isset($_POST['trace_t'])) {

  // Grabing the data
  $trace_number = $_POST['trace_number'];


//instantiate Classes

include "../classes/dbc.classes.php"; 
include "../classes/trace.classes.php"; 
include "../classes/trace-contr.classes.php";

$login = new logincontr($trace_number);


// Runing handler and user login 

$login->loginUser();

session_start();

//Going back to front page 

header("Location:../check.php?code=".$_SESSION['trace_number']);





}





?>