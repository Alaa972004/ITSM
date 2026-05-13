<?php

session_start();

if(
    !isset($_POST['csrf_token']) ||
    $_POST['csrf_token'] !== $_SESSION['csrf_token']
){
    die("CSRF validation failed");
}

if(isset($_POST['submit'])){

    include "../classes/dbc.classes.php";

    // Get data safely
    $ticket_id = (int)$_POST['rate_ticketid'];

    $company = trim($_POST['rate_company']);

    $service = trim($_POST['rate_service']);

    // Default rating
    $star = 5;

    $database = new Connection();

    $stmt = $database->openConnection()->prepare("
    INSERT INTO rate
    VALUES(
        NULL,
        :ticket_id,
        :company,
        :service,
        :star
    )
    ");

    $stmt->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
    $stmt->bindParam(':company', $company);
    $stmt->bindParam(':service', $service);
    $stmt->bindParam(':star', $star, PDO::PARAM_INT);

    $stmt->execute();

    header("Location:../check.php?rating=submitted");

    exit();
}

?>