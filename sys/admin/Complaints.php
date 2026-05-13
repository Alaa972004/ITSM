
<?php session_start(); ?>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php if(isset($_SESSION['uname']) && $_SESSION['role'] == 70): ?>



  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">ITSM</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="Dashboard.php"  >
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
          <a href="complaints.php" class="active">
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
        <span class="dashboard">Complaints</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
       <i class='fa fa-user-circle-o' aria-hidden="true"></i>
       <span class="admin_name" >Welcome Back !</span>
        <span class="admin_name" style="color:#fe3f40"><?php echo htmlspecialchars($_SESSION['uname'], ENT_QUOTES, 'UTF-8'); ?></span>
        <!--         <i class='bx bx-chevron-down' ></i>
 -->      </div>
    </nav>

   
<!-- start table -->




<br>
<table id="table1">
    <tr>
      <th>Id</th>
      <th>Sender Name</th>
      <th>E-mail</th>
      <th>Subject</th>
      <th>Message</th>
      <th>Date</th>
    </tr>


    <?php 

 include_once '../classes/dbc.classes.php';

$database = new Connection();
  $db = $database->openConnection();
  $query = "SELECT * FROM compliants";
$result = $db->query($query);
 ?>

 <?php
 $sn=1;
 while($data = $result->fetch(PDO::FETCH_ASSOC)) {
   
   ?>
    <tr>
   <td><?php echo (int)$data['id']; ?> </td>
   <td><?php echo htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8'); ?> </td>
   <td><?php echo htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8'); ?> </td>
   <td><?php echo htmlspecialchars($data['subject'], ENT_QUOTES, 'UTF-8'); ?> </td>
   <td><?php echo htmlspecialchars($data['message'], ENT_QUOTES, 'UTF-8'); ?> </td>
   <td><<?php echo htmlspecialchars($data['date'], ENT_QUOTES, 'UTF-8'); ?> </td>
    </tr>
    <?php
  }
  ?>



</table>



<!-- end table-->


  </section>



  

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

