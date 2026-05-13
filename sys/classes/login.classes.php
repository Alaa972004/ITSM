<?php

session_start();

class login extends Connection {

    protected function getUser($uname, $upwd){

        $database = new Connection();

        $stmt = $database->openConnection()->prepare("SELECT * FROM users WHERE username = :user_name");

        $stmt->bindParam(':user_name', $uname);

        $stmt->execute();

        /* User Not Found */
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

        /* Store Session Data */
        $_SESSION['uname'] = $user["username"];
        $_SESSION['role'] = $user["u_role"];
        $_SESSION['u_id'] = $user["id"];
        session_regenerate_id(true);
    }
}

?>