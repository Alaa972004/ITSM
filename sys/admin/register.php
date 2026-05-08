
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




<?php if(isset($_SESSION['uname'])) : ?>


  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">ITSM</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="Dashboard.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="register.php" class="active">
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
          <a href="employee.php">
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
        <span class="dashboard">Register user</span>
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

    <div>

    <br><br><br>

<form class="operation_form" method="POST" action="../includes/register.inc.php">
  <span><h2 class='set'>Add a New Employee</h2></span><br>

  <label for="fname"><b>Full Name</b></label>
  <input class="set" type="text" id="fname" name="fname"  placeholder=" Name " required>

  <label for="lname"><b>E-mail</b></label>
  <input class="set" type="email" id="lname" name="email"  placeholder=" email" required>


    <label for="Employee "><b>Job Position</b></label>
    <select id="service" name="position">
      <option value="Choose">Choose...</option> 
         <option value="80">Leader / Technical Manager</option>
             <option value="90">Technician</option>
                 
    </select>


  <label for="lname"><b>Password</b></label>
  <input class="set" type="password" id="lname" name="new_password" onChange="onChange()" placeholder="Enter your New Password..." required>


  <label for="lname"><b>Confirm Password</b></label>
  <input class="set" type="password" id="lname" name="new_password_re"  onChange="onChange()" placeholder="Re-enter your New Password..." required>

  <input class="input2" type="submit" value="Register" name='reg'>
  <input class="input2" type="reset" value="cancel">
</form>
</div>





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

