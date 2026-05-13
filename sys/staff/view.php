<?php
session_start();

if(empty($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- for upload -->

   </head>
<body>




<?php if(isset($_SESSION['uname']) && $_SESSION['role'] == 90): ?>

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
          <a href="Tasks.php" class="active">
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
          <a href="completed.php">
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
        <span class="dashboard">View Task</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
                         <i class='fa fa-user-circle-o' aria-hidden="true"></i>
                                 <span class="admin_name" >Welcome Back !</span>

        <span class="admin_name" style="color:#fe3f40"><?php echo "&nbsp".htmlspecialchars($_SESSION['uname'], ENT_QUOTES, 'UTF-8')."&nbsp"; ?></span>


<!--         <i class='bx bx-chevron-down' ></i>
 -->      </div>
    </nav>
  


   <!-- start page -->



<br>
<br>
<br>
<br>
    <?php 

 include_once '../classes/dbc.classes.php';
$user = $_SESSION['u_id'];
$t_id = (int)$_GET['id'];
$database = new Connection();
  $db = $database->openConnection();
 $stmt = $db->prepare("SELECT * FROM tickets WHERE id = :id");
$stmt->bindParam(':id', $t_id, PDO::PARAM_INT);
$stmt->execute();
 ?>

 <?php
 $sn=1;
$data = $stmt->fetch(PDO::FETCH_ASSOC);
   
   ?>
<div>


  <form class="view_form" method="POST" action="../includes/view.inc.php" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <span><h2 class='set'>Details</h2></span><br>
    <h4>Ticket ID </h4>
        <h4 class="par" name="ti_id"><?php echo $t_id; ?> </h4>
    <br>
    <label for="fname"><b>Sender Name</b></label>
 <h4 class="par_view">  <?php echo htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8'); ?> </h4>

    <label for="lname"><b>Company Name</b></label>
   <h4 class="par_view"><?php echo htmlspecialchars($data['company'], ENT_QUOTES, 'UTF-8'); ?></h4>

    <label for="lname"><b>Email</b></label>
   <h4 class="par_view"><?php echo htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8'); ?> </h4>


    <label for="lname"><b>Phone No.</b></label>
   <h4 class="par_view"><?php echo htmlspecialchars($data['phone'], ENT_QUOTES, 'UTF-8'); ?></h4>

    <label for="lname"><b>Requsted Service</b></label>
   <h4 class="par_view"><?php echo htmlspecialchars($data['service'], ENT_QUOTES, 'UTF-8'); ?></h4>

    <label for="lname"><b>Location</b></label>
   <h4 class="par_view"><?php echo htmlspecialchars($data['location'], ENT_QUOTES, 'UTF-8'); ?></h4>

   <label for="lname"><b>Information</b></label>
   <h4 class="par_view"><?php echo htmlspecialchars($data['info'], ENT_QUOTES, 'UTF-8'); ?></h4>

   <label for="lname"><b>Status of Ticket</b></label>
   <h4 class="par_view">  <?php 
if ($data['t_status'] == 0) {
  echo "Awating..." ;
} elseif($data['t_status'] == 1) {
  echo "Under Processing" ;
}elseif($data['t_status'] == 2){
    echo "Completed" ;
}else{
    echo "None";
}
  ?></h4>
<label for="cl5"><b>Details</b></label>
                      <textarea type="text" style="height:300px; width: 100%;" class="form-control input_box"  id = "cl5" name="det" placeholder="Describe your work here..." value="None"></textarea>

        <label for="fileSelect"><strong>Upload Your Report / pics of work:</strong></label>
        <input type="file" name="photo" id="fileSelect">
  <div class="checkboxes">
    <h5><input type="checkbox"  name="ti_id" value="<?php echo $t_id; ?>" required> <span>Check if The Task is Completed </span></h5>
  </div>

    <input class="input2" type="submit" value="completed" name='update_view'>

  </form>



</div>


    <br>


   <!-- end page -->


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