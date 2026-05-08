<?php 

namespace OP ;

//error check
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use Connection;

Class Operation extends Connection {
private $clname;
private $clnum;
private $type;
private $details;
private $reportnumber;
private $startdate;
private $enddate;

public function __construct($clname,$clnum,$type,$details,$reportnumber,$startdate,$enddate){


$this->clname = $clname ;
$this->clnum = $clnum;
$this->type = $type;
$this->details = $details;
$this->reportnumber = $reportnumber;
$this->startdate = $startdate;
$this->enddate = $enddate;
}

public function insertData(){


$data = [
    'client_name' => $this->clname,
    'client_number' => $this->clnum,
    'r_type' => $this->type,
    'details' => $this->details,
    'reportnumber' => $this->reportnumber,
    'startdate' => $this->startdate,
    'enddate' => $this->enddate,
];

echo $data;

$insert_sql = "INSERT INTO ReportsInfo (client_name, client_number, r_type,details,reportnumber,startdate,enddate) 
VALUES (:client_name, :client_number, :r_type, :details , :reportnumber , :startdate , :enddate)";

 $database = new Connection();
  $stmt = $database->openConnection()->prepare($insert_sql);
  $stmt->execute($data);


if ($stmt == false ) {
header("location:../Dashboard.php?error=querynotworking");
}


 $stmt = NULL;
header("location:../Dashboard.php?insertedsucessfully");



 }




/* delete rows */

public function deleteData(){


$data1 = [
    'client_name' => $this->clname,
    'client_number' => $this->clnum,
    'reportnumber' => $this->reportnumber,
];



$delete_sql = "DELETE FROM ReportsInfo WHERE client_name = :client_name AND client_number = :client_number AND reportnumber = :reportnumber;";

 $database = new Connection();
  $stmt = $database->openConnection()->prepare($delete_sql);
  $stmt->execute($data1);


if ($stmt == false ) {
header("location:../Dashboard.php?error=querynotworking");
}


 $stmt = NULL;
header("location:../Dashboard.php?deletedsucessfully");


}


/* update data */

public function updateData(){


$data2 = [
  'client_name' => $this->clname,
    'client_number' => $this->clnum,
    'r_type' => $this->type,
    'details' => $this->details,
    'reportnumber' => $this->reportnumber,
    'startdate' => $this->startdate,
    'enddate' => $this->enddate,
];



$update_sql = "UPDATE ReportsInfo
SET client_name = :client_name , client_number = :client_number, r_type = :r_type , details = :details , reportnumber = :reportnumber ,
startdate = :startdate , enddate = :enddate 
WHERE reportnumber = :reportnumber;";

 $database = new Connection();
  $stmt = $database->openConnection()->prepare($update_sql);
  $stmt->execute($data2);


if ($stmt == false ) {
header("location:../Dashboard.php?error=querynotworking");
}


 $stmt = NULL;
header("location:../Dashboard.php?updatedsucessfully");


}





}

?>