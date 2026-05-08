<?php

session_start();
<<<<<<< HEAD

/* Clear all session variables */
session_unset();

/* Destroy session */
session_destroy();

/* Remove session cookie */
if (ini_get("session.use_cookies")) {

    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

/* Redirect to login page */
header("Location: ../Login.php?logout=success");
exit();
=======
session_unset();
session_destroy();

//Going back to front page 


header("Location:../Login.php?logedout");

>>>>>>> 0f6525af960500fcc2486423c846eeabd7e1196d

?>