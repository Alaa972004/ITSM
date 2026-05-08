<?php 


Class logincontr extends login {
private $uname;
private $upwd;

public function __construct($uname,$upwd){

$this->uname = $uname ;
$this->upwd = $upwd;

}

public function loginUser(){

if ($this->emptyInput() == false ) {
	// Empty input
header("Location:../Login.php?error=emptyinput");
exit();

}


$this->getUser($this->uname ,$this->upwd);

 }

// if user name or password is empty return false
private function emptyInput(){

$result; 
if (empty($this->uname) || empty($this->upwd)) {
	$result = false;
}else {
	$result = true;
}

return $result;
}

}


?>