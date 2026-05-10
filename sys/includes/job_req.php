<?php 

if (isset($_POST['submit_t'])) {

include "../classes/dbc.classes.php"; 

// Grabing the data

$fname = trim($_POST['fname']);
$cname = trim($_POST['cname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$service = $_POST['service'];
$location = $_POST['location'];
$subject = trim($_POST['subject']);
$random_id = "TCK-" . strtoupper(substr(md5(uniqid()), 0, 8));

/* =========================
   LENGTH VALIDATION
========================= */

// Full name length
if(strlen($fname) < 3 || strlen($fname) > 50){
    die("Full name must be between 3 and 50 characters");
}

// Company name length
if(strlen($cname) < 2 || strlen($cname) > 50){
    die("Company name is invalid");
}

// Subject length
if(strlen($subject) < 10 || strlen($subject) > 300){
    die("Subject must be between 10 and 300 characters");
}

// Phone number length
if(strlen($phone) < 10 || strlen($phone) > 15){
    die("Invalid phone number");
}

/* =========================
   ALLOWED CHARACTERS
========================= */

// Full name → letters and spaces only
if(!preg_match('/^[a-zA-Z ]+$/', $fname)){
    die("Name contains invalid characters");
}

// Company name → letters, numbers and spaces
if(!preg_match('/^[a-zA-Z0-9 ]+$/', $cname)){
    die("Company name contains invalid characters");
}

// Phone → numbers only
if(!preg_match('/^[0-9+]+$/', $phone)){
    die("Phone must contain numbers only");
}

/* =========================
   EMAIL VALIDATION
========================= */

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die("Invalid email address");
}

/* =========================
   DATABASE INSERT
========================= */

$submit_ticket = new Connection();

$st = $submit_ticket->openConnection()->prepare("
insert into tickets 
values(
Null,
:fname,
:cname,
:email,
:phone,
:service,
:location,
:subject,
0,
:random_id
)");

$st->execute(array(

    ':fname' => $fname,
    ':cname' => $cname,
    ':email' => $email,
    ':phone' => $phone,
    ':service' => $service,
    ':location' => $location,
    ':subject' => $subject,
    ':random_id' => $random_id

));

echo "
<script>

alert('Your Ticket Number is: $random_id\\nPlease Save it!');

window.location.href='../jobrequest.php';

</script>
";

exit();

}

?>
```
