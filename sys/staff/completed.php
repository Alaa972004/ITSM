
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




<?php if(isset($_SESSION['uname']) && $_SESSION['role'] == 90) : ?>

    <?php 

 include_once '../classes/dbc.classes.php';

$database = new Connection();
  $db = $database->openConnection();
  $query = "SELECT * FROM tickets";
$stmt = $db->query($query);
$row_count = $stmt->rowCount();
 ?>

  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">ITSM</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="Tasks.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Tasks</span>
          </a>
        </li>
          <li>
          <a href="under processing.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name"> under processing</span>
          </a>
        </li>
        <li>
          <a href="completed.php" class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">completed</span>
          </a>
        </li>
        
        
        <li>
          <a href="team.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
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
        <span class="dashboard">completed Tasks</span>
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
    <!-- start table -->




<br>
<table id="table1">
    <tr>
      <th>ID</th>
      <th>Sender Name</th>
      <th>Company</th>
      <th>E-mail</th>
      <th>Phone No.</th>
      <th>Requsted Service</th>
            <th>Location</th>
      <th>Additional Info</th>
      <th>Status</th>
    </tr>


    <?php 

 include_once '../classes/dbc.classes.php';

$database = new Connection();
  $db = $database->openConnection();
  $query = "SELECT * FROM tickets WHERE t_status = 2";
$result = $db->query($query);
 ?>

 <?php
 $sn=1;
 while($data = $result->fetch(PDO::FETCH_ASSOC)) {
   
   ?>
    <tr>
   <td><?php echo $data['id']; ?> </td>
   <td><?php echo $data['name']; ?> </td>
   <td><?php echo $data['company']; ?> </td>
   <td><?php echo $data['email']; ?> </td>
   <td><?php echo $data['phone']; ?> </td>
   <td><?php echo $data['service']; ?> </td>
      <td><?php echo $data['location']; ?> </td>
   <td><?php echo $data['info']; ?> </td>

  <?php 
if ($data['t_status'] == 0) {
  echo "<td class='case0'>"."Not Taken" . "</td>";
} elseif($data['t_status'] == 1) {
  echo "<td class='case1'>"."Under Processing" . "</td>";
}elseif($data['t_status'] == 2){
    echo "<td class='case2'>"."Completed" . "</td>";
}else{
    echo "<td class='case0'>"."None" . "</td>";
}
  ?>
    </tr>
    <?php
  }
  ?>



</table>



<!-- end table-->


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

