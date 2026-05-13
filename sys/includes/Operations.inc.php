<?php 

session_start();

if(
    !isset($_POST['csrf_token']) ||
    $_POST['csrf_token'] !== $_SESSION['csrf_token']
){
    die("CSRF validation failed");
}

// error check
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (isset($_POST['insert_op'])) {

	// Grabing the data
	$clname = trim($_POST['clname']);
	$clnum = $_POST['clnum'];
	$type = $_POST['type'];
	$details = trim($_POST['details']);
	$reportnumber = $_POST['reportnumber'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];

    /* Validation */

    if(strlen($clname) < 3 || strlen($clname) > 50){
        die("Invalid client name");
    }

    if(strlen($details) < 5 || strlen($details) > 300){
        die("Invalid details");
    }

    if(!preg_match('/^[a-zA-Z0-9 ]+$/', $clname)){
        die("Invalid characters in client name");
    }

    //instantiate Classes
    require_once "../classes/dbc.classes.php"; 
    require_once "../classes/Operation-contr.classes.php"; 

    // Runing handler 
    $makeOperation = new OP\Operation(
        $clname,
        $clnum,
        $type,
        $details,
        $reportnumber,
        $startdate,
        $enddate
    );

    $makeOperation->insertData();

}
elseif (isset($_POST['delete_op'])) {

	// Grabing the data
	$clname = trim($_POST['clname']);
	$clnum = $_POST['clnum'];
	$type = $_POST['type'];
	$details = trim($_POST['details']);
	$reportnumber = $_POST['reportnumber'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];

    /* Validation */

    if(strlen($clname) < 3 || strlen($clname) > 50){
        die("Invalid client name");
    }

    if(strlen($details) < 5 || strlen($details) > 300){
        die("Invalid details");
    }

    if(!preg_match('/^[a-zA-Z0-9 ]+$/', $clname)){
        die("Invalid characters in client name");
    }

    //instantiate Classes
    require_once "../classes/dbc.classes.php"; 
    require_once "../classes/Operation-contr.classes.php"; 

    $makeOperation = new OP\Operation(
        $clname,
        $clnum,
        $type,
        $details,
        $reportnumber,
        $startdate,
        $enddate
    );

    $makeOperation->deleteData();

}
elseif (isset($_POST['update_op'])) {

	// Grabing the data
	$clname = trim($_POST['clname']);
	$clnum = $_POST['clnum'];
	$type = $_POST['type'];
	$details = trim($_POST['details']);
	$reportnumber = $_POST['reportnumber'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];

    /* Validation */

    if(strlen($clname) < 3 || strlen($clname) > 50){
        die("Invalid client name");
    }

    if(strlen($details) < 5 || strlen($details) > 300){
        die("Invalid details");
    }

    if(!preg_match('/^[a-zA-Z0-9 ]+$/', $clname)){
        die("Invalid characters in client name");
    }

    //instantiate Classes
    require_once "../classes/dbc.classes.php"; 
    require_once "../classes/Operation-contr.classes.php"; 

    $makeOperation = new OP\Operation(
        $clname,
        $clnum,
        $type,
        $details,
        $reportnumber,
        $startdate,
        $enddate
    );

    $makeOperation->updateData();
}

?>