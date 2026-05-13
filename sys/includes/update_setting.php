<?php 

session_start();

if(
    !isset($_POST['csrf_token']) ||
    $_POST['csrf_token'] !== $_SESSION['csrf_token']
){
    die("CSRF validation failed");
}

if (isset($_POST['update_set'])) {

    include "../classes/dbc.classes.php"; 

    // Grabing the data
    $fname = trim($_POST['fname']);
    $email = trim($_POST['email']);
    $new_password = trim($_POST['new_password']);
    $uname = $_SESSION['uname'];

    /* Hash password */
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $userfind = new Connection();

    $st1 = $userfind->openConnection()->prepare("
    UPDATE users
    SET username = :username,
        email = :email,
        user_password = :password
    WHERE username = :uname
    ");

    $st1->bindParam(':uname', $uname);
    $st1->bindParam(':username', $fname);
    $st1->bindParam(':email', $email);
    $st1->bindParam(':password', $hashed_password);

    $st1->execute();

    /* Update session */
    if ($_SESSION['uname'] == $uname) {

        $_SESSION['uname'] = $fname;
    }

    header("Location:../leader/setting.php?updated_successfully");

    exit();
}

?>س