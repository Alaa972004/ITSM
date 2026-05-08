<?php 

if (isset($_POST['reg'])) {

    include "../classes/dbc.classes.php"; 

    $fname = trim($_POST['fname']);
    $email = trim($_POST['email']);
    $new_password = trim($_POST['new_password']);
    $position = $_POST['position'];

    /* Hash password */
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $register = new Connection();

    $st1 = $register->openConnection()->prepare("INSERT INTO users VALUES(Null,:position,:username,:email,:upassword)");

    $st1->bindParam(':position', $position);
    $st1->bindParam(':username', $fname);
    $st1->bindParam(':email', $email);
    $st1->bindParam(':upassword', $hashed_password);

    $st1->execute();

    header("Location:../admin/register.php?registered_successfully");
    exit();
}
?>