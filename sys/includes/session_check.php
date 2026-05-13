<?php

session_start();

/* Session timeout duration */
$timeout = 900;

/* Check last activity */
if(isset($_SESSION['last_activity'])){

    if(time() - $_SESSION['last_activity'] > $timeout){

        session_unset();
        session_destroy();

        header("Location: ../Login.php?session=expired");
        exit();
    }
}

/* Update last activity time */
$_SESSION['last_activity'] = time();

?>