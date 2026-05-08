<<<<<<< HEAD
<?php

session_start();

class login extends Connection {

    protected function getUser($uname, $upwd){

        $database = new Connection();

        $stmt = $database->openConnection()->prepare("SELECT * FROM users WHERE username = :user_name");

        $stmt->bindParam(':user_name', $uname);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {

            header("Location:../Login.php?error=usernotfound");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        /* Verify hashed password */
        if (!password_verify(trim($upwd), $user["user_password"])) {

            header("Location:../Login.php?error=wrongpassword");
            exit();
        }

        $_SESSION['uname'] = $user["username"];
        $_SESSION['role'] = $user["u_role"];
        $_SESSION['u_id'] = $user["id"];
    }
}
=======
<?php 



Class login extends Connection {


protected function getUser($uname,$upwd){
 $database = new Connection();
  $stmt = $database->openConnection()->prepare("SELECT * FROM users WHERE username = :user_name ;");
 $stmt->bindParam(':user_name', $uname);
  $stmt->execute();


if ($stmt == false ) {
header("location:../Login.php?error=querynotworking");
}

if ($stmt->rowCount() == 0) {
    $stmt = null;
header("location:../Login.php?error=usernotfound");
    // echo("usernotfound");
  exit();
}


$upwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
$hash2 = password_hash($upwdHashed[0]["user_password"], PASSWORD_DEFAULT);
$checkPwd = password_verify($upwd, $hash2);



if ($checkPwd == false) {
    $stmt = null;
header("Location:../Login.php?error=wronpassword");
exit();


}elseif ($checkPwd == true) {
$stmt = $database->openConnection()->prepare("SELECT * FROM users WHERE username = :user_name AND user_password = :user_password;");
 $stmt->bindParam(':user_name', $uname);
  $stmt->bindParam(':user_password', $upwd);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    $stmt = null;
header("Location:../Login.php?error=usernotfound");
exit();
}

$user = $stmt->fetchAll(PDO::FETCH_ASSOC);



session_start();

foreach ($user as $row => $link) {
    $_SESSION['uname'] = $user[0]["username"];
$_SESSION['upwd'] = $user[0]["user_password"];
$_SESSION['role'] = $user[0]["u_role"];
$_SESSION['u_id'] = $user[0]["id"];

  }


}


 $stmt = NULL;


}

}

>>>>>>> 0f6525af960500fcc2486423c846eeabd7e1196d
?>