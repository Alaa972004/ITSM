<<<<<<< HEAD
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
=======

<?php session_start(); ?>
  <head>
>>>>>>> 0f6525af960500fcc2486423c846eeabd7e1196d
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<<<<<<< HEAD
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php 

include_once '../classes/dbc.classes.php';

$database = new Connection();
$db = $database->openConnection();

$query = "SELECT * FROM tickets";
=======
     <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php if(isset($_SESSION['uname']) && $_SESSION['role'] == 70): ?>

    <?php 

 include_once '../classes/dbc.classes.php';

$database = new Connection();
  $db = $database->openConnection();
  $query = "SELECT * FROM tickets";
>>>>>>> 0f6525af960500fcc2486423c846eeabd7e1196d
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

<<<<<<< HEAD
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
                <?php echo "&nbsp".$_SESSION['uname']."&nbsp"; ?>
            </span>
        </div>

    </nav>

    <div class="home-content">

        <div class="overview-boxes">

            <div class="box">

                <div class="right-side">

                    <div class="box-topic">Total Tickets</div>

                    <div class="number"><?php echo $row_count; ?></div>

                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from last month</span>
                    </div>

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

                    <div class="number">1</div>

                </div>

                <i class='fa fa-envelope cart four'></i>

            </div>

        </div>

        <!-- Rating -->

        <div class="row">

            <span class="header">Customer Rating</span>

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>

            <br>

            <?php echo round($AVG).' Average Based on '.$row_count4.' Reviews'; ?>

            <br>

            <div class="side">
                <div>5 star</div>
            </div>

            <div class="middle">
                <div class="bar-container">
                    <div class="bar-5"></div>
                </div>
            </div>

            <div class="side right">
                <div><?php echo $five; ?></div>
            </div>

            <div class="side">
                <div>4 star</div>
            </div>

            <div class="middle">
                <div class="bar-container">
                    <div class="bar-4"></div>
                </div>
            </div>

            <div class="side right">
                <div><?php echo $four; ?></div>
            </div>

            <div class="side">
                <div>3 star</div>
            </div>

            <div class="middle">
                <div class="bar-container">
                    <div class="bar-3"></div>
                </div>
            </div>

            <div class="side right">
                <div><?php echo $three; ?></div>
            </div>

            <div class="side">
                <div>2 star</div>
            </div>

            <div class="middle">
                <div class="bar-container">
                    <div class="bar-2"></div>
                </div>
            </div>

            <div class="side right">
                <div><?php echo $two; ?></div>
            </div>

            <div class="side">
                <div>1 star</div>
            </div>

            <div class="middle">
                <div class="bar-container">
                    <div class="bar-1"></div>
                </div>
            </div>

            <div class="side right">
                <div><?php echo $one; ?></div>
            </div>

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
=======
// $query4 = "SELECT star FROM rate";
// $stmt = $db->query($query4);
// $row_count4 = $stmt->rowCount();

// $query5 = "SELECT AVG(star) FROM rate";
// $stmt = $db->query($query5);
// $AVG = $stmt->rowCount();

$stmt = $database->openConnection()->prepare("SELECT star FROM rate");
$stmt->execute();
// $row_count4 = $stmt->rowCount();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$row_count4= count($result);
$five =0;
$four =0;
$three=0;
$two=0;
$one=0;
$sum = 0 ;
for($x = 0; $x < $row_count4; $x++) {
  $sum = $sum + $result[$x]['star'];
  if ($result[$x]['star'] == 5) {
    $five = ++$five;
  } elseif ($result[$x]['star'] == 4) {
    $four = ++$four;
  }elseif($result[$x]['star'] == 3) {
    $three = ++$three;
  }elseif($result[$x]['star'] == 2){
    $two = ++$two;
  }else{
        $one = ++$one;
  }
 
}

$AVG = $sum /$row_count4;
 ?>


  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">ITSM</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="Dashboard.php"  class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="register.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Register User</span>
          </a>
        </li>
        <!--
        <li>
          <a href="tasks.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Tasks</span>
          </a>
        </li>
-->
        <li>
          <a href="employee.php" >
            <i class='bx bx-user' ></i>
            <span class="links_name">Employee</span>
          </a>
        </li>
        <li>
          <a href="complaints.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Complaints</span>
          </a>
        </li>
        <li>
          <a href="Setting.php">
            <i class='bx bx-cog' ></i>
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
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
       <i class='fa fa-user-circle-o' aria-hidden="true"></i>
       <span class="admin_name" >Welcome Back !</span>
        <span class="admin_name" style="color:#fe3f40"><?php echo "&nbsp".$_SESSION['uname']."&nbsp"; ?></span>
        <!--         <i class='bx bx-chevron-down' ></i>
 -->      </div>
    </nav>

   
  <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Tickets</div>
            <div class="number"><?php echo $row_count; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from last month</span>
            </div>
          </div>

          <i class="bx bx-box cart" aria-hidden="true"></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">under processing</div>
            <div class="number"><?php echo $row_count1; ?></div>
            <div class="indicator">
            </div>
          </div>
          <i class="fa fa-eye cart two" aria-hidden="true" ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">completed job</div>
            <div class="number"><?php echo $row_count2; ?></div>
            <div class="indicator">
            </div>
          </div>
          <i class='fa fa-check-square-o cart three' aria-hidden="true" ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">compliantes recived</div>
            <div class="number">1</div>
            <div class="indicator">
            </div>
          </div>
          <i class='fa fa-envelope cart four' ></i>

        </div>
      </div>


<!-- star rating bar -->



<div class="row">
  <span class="header">Customer Rating</span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span><br>
 <?php  echo round($AVG).'&nbsp;'."Average".'&nbsp;'."Based on".'&nbsp;'.$row_count4.'&nbsp;'."Reviews";?>
<br>
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo $five ;?></div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo $four ;?></div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo $three ;?></div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo $two ;?></div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo $one ;?></div>
  </div>
</div>
<!-- end rating bar -->
 

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>




<?php else : ?>




<center><h1> You Must Login first</h1></center>



<?php endif; ?>


</body>
</html>

>>>>>>> 0f6525af960500fcc2486423c846eeabd7e1196d
