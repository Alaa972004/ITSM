<?php 


Class logincontr extends login {
private $trace_number;

public function __construct($trace_number){

$this->trace_number = $trace_number ;

}

public function loginUser(){

if ($this->emptyInput() == false ) {
	// Empty input
header("Location:../trace.php?error=emptyinput");
exit();

}


$this->getUser($this->trace_number);

 }

// if user name or password is empty return false
private function emptyInput(){

$result; 
if (empty($this->trace_number)) {
	$result = false;
}else {
	$result = true;
}

return $result;
}

}


?>