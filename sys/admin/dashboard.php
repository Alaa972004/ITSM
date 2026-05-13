<?php

include_once "../includes/session_check.php";

/* Check if user logged in */
if(!isset($_SESSION['uname'])){
    header("Location: ../Login.php");
    exit();
}

/* Check admin role */
if($_SESSION['role'] != 70){
    die("Access Denied");
}

/* Prevent Session Fixation */
session_regenerate_id(true);

?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php 

include_once '../classes/dbc.classes.php';

$database = new Connection();
$db = $database->openConnection();

$query = "SELECT * FROM tickets";
$stmt = $db->query($query);
$row_count = $stmt->rowCount();

$query1 = "SELECT * FROM tasks where t_st = 1";
$stmt = $db->query($query1);
$row_count1 = $stmt->rowCount();

$query2 = "SELECT * FROM tasks where t_st = 2";
$stmt = $db->query($query2);
$row_count2 = $stmt->rowCount();

$query3 = "SELECT * FROM compliants";
$stmt = $db->query($query3);
$row_count3 = $stmt->rowCount();

$stmt = $database->openConnection()->prepare("SELECT star FROM rate");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$row_count4 = count($result);

$five = 0;
$four = 0;
$three = 0;
$two = 0;
$one = 0;
$sum = 0;

for($x = 0; $x < $row_count4; $x++) {

    $sum = $sum + $result[$x]['star'];

    if ($result[$x]['star'] == 5) {

        $five++;

    } elseif ($result[$x]['star'] == 4) {

        $four++;

    } elseif($result[$x]['star'] == 3) {

        $three++;

    } elseif($result[$x]['star'] == 2){

        $two++;

    } else {

        $one++;
    }
}

$AVG = $sum / $row_count4;

?>

<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">ITSM</span>
    </div>

    <ul class="nav-links">

        <li>
            <a href="Dashboard.php" class="active">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="register.php">
                <i class='bx bx-box'></i>
                <span class="links_name">Register User</span>
            </a>
        </li>

        <li>
            <a href="employee.php">
                <i class='bx bx-user'></i>
                <span class="links_name">Employee</span>
            </a>
        </li>

        <li>
            <a href="complaints.php">
                <i class='bx bx-message'></i>
                <span class="links_name">Complaints</span>
            </a>
        </li>

        <li>
            <a href="Setting.php">
                <i class='bx bx-cog'></i>
                <span class="links_name">Setting</span>
            </a>
        </li>

        <li class="log_out">
            <a href="../includes/logout.inc.php">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
        </li>

    </ul>
</div>

<section class="home-section">

    <nav>

        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Dashboard</span>
        </div>

        <div class="profile-details">
            <i class='fa fa-user-circle-o' aria-hidden="true"></i>

            <span class="admin_name">Welcome Back !</span>

            <span class="admin_name" style="color:#fe3f40">
                <?php echo "&nbsp".htmlspecialchars($_SESSION['uname'], ENT_QUOTES, 'UTF-8')."&nbsp"; ?>
            </span>
        </div>

    </nav>

    <div class="home-content">

        <div class="overview-boxes">

            <div class="box">

                <div class="right-side">

                    <div class="box-topic">Total Tickets</div>

                    <div class="number"><?php echo $row_count; ?></div>

                </div>

                <i class="bx bx-box cart" aria-hidden="true"></i>

            </div>

            <div class="box">

                <div class="right-side">

                    <div class="box-topic">under processing</div>

                    <div class="number"><?php echo $row_count1; ?></div>

                </div>

                <i class="fa fa-eye cart two" aria-hidden="true"></i>

            </div>

            <div class="box">

                <div class="right-side">

                    <div class="box-topic">completed job</div>

                    <div class="number"><?php echo $row_count2; ?></div>

                </div>

                <i class='fa fa-check-square-o cart three' aria-hidden="true"></i>

            </div>

            <div class="box">

                <div class="right-side">

                    <div class="box-topic">compliantes recived</div>

                    <div class="number"><?php echo $row_count3; ?></div>

                </div>

                <i class='fa fa-envelope cart four'></i>

            </div>

        </div>

        <div class="row">

            <span class="header">Customer Rating</span>

            <br><br>

            <?php echo round($AVG).' Average Based on '.$row_count4.' Reviews'; ?>

        </div>

    </div>

</section>

<script>

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");

sidebarBtn.onclick = function() {

    sidebar.classList.toggle("active");

    if(sidebar.classList.contains("active")){

        sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");

    } else {

        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
}

</script>

</body>
</html>