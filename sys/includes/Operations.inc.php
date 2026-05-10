<?php 

// error check
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (isset($_POST['insert_op'])) {

	// Grabing the data
	$clname = $_POST['clname'];
	$clnum = $_POST['clnum'];
	$type = $_POST['type'];
	$details = $_POST['details'];
	$reportnumber = $_POST['reportnumber'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];

// echo $clname,$clnum,$type,$details,$reportnumber,$startdate,$enddate ;
//instantiate Classes
// 
require_once  "../classes/dbc.classes.php"; 
require_once  "../classes/Operation-contr.classes.php"; 

// // Runing handler 


 $makeOperation = new OP\Operation($clname,$clnum,$type,$details,$reportnumber,$startdate,$enddate);

 $makeOperation->insertData();


// header("Location:../Dashboard.php?error=none");

}
elseif (isset($_POST['delete_op'])) {

	// Grabing the data
	$clname = $_POST['clname'];
	$clnum = $_POST['clnum'];
	$type = $_POST['type'];
	$details = $_POST['details'];
	$reportnumber = $_POST['reportnumber'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];

//instantiate Classes
require_once  "../classes/dbc.classes.php"; 
require_once  "../classes/Operation-contr.classes.php"; 


 $makeOperation = new OP\Operation($clname,$clnum,$type,$details,$reportnumber,$startdate,$enddate);

 $makeOperation->deleteData();

}elseif (isset($_POST['update_op'])) {

// if you want to send just 3 parameters it's most likely you would create another constructor with only 3 parameters i guess
	// Grabing the data
	$clname = $_POST['clname'];
	$clnum = $_POST['clnum'];
	$type = $_POST['type'];
	$details = $_POST['details'];
	$reportnumber = $_POST['reportnumber'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];

	//instantiate Classes
require_once  "../classes/dbc.classes.php"; 
require_once  "../classes/Operation-contr.classes.php"; 

 $makeOperation = new OP\Operation($clname,$clnum,$type,$details,$reportnumber,$startdate,$enddate);

 $makeOperation->updateData();
}

?>