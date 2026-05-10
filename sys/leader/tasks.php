
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




<?php if(isset($_SESSION['uname'])&& $_SESSION['role'] == 80) : ?>


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
          <a href="tickets.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Tickets</span>
          </a>
        </li>
        <li>
          <a href="tasks.php" class="active">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Tasks</span>
          </a>
        </li>
             <li>
          <a href="Report.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Reports</span>
          </a>
        </li>
        <li>
          <a href="team.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="compliants.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">compliants</span>
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
        <span class="dashboard">Tasks</span>
      </div>
      <div class="search-box">
        <input id="textSearch" type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
                 <i class='fa fa-user-circle-o' aria-hidden="true"></i>
                                 <span class="admin_name" >Welcome Back !</span>

        <span class="admin_name" style="color:#fe3f40"><?php echo "&nbsp".$_SESSION['uname']."&nbsp"; ?></span>


        <!--         <i class='bx bx-chevron-down' ></i>
 -->      </div>
    </nav>

   <!-- start form -->



<br>
<br>
<br>
<br>

<h1 class="header1">Assign A New Task to Staff</h1>
<div>
  <form class="operation_form" method="post" action="../includes/ticket_as.php">
                        <label for="cl1"><b>Ticket Number</b></label>
                        <input type="Number" class="form-control input_box" id = "cl1" name="ticket_id" required placeholder="Ticket Number">
                      
                        <label for="cl2"><b>E-mail</b></label>
                      <input type="E-mail" class="form-control input_box"  id = "cl2" name="email" placeholder="E-mail">
                   
                        <label for="cl3"><b>Phone</b></label>
                      <input type="Phone" class="form-control input_box"  id = "cl3" name="Phone" placeholder="Phone">
                       
                        <label for="cl4"><b>Service Type</b></label>
                      <input type="text"  class="form-control input_box" id = "cl4" name="service_t" required placeholder="Service Type">
                        
                        <label for="cl5"><b>Task Additional Information</b></label>
                      <textarea type="text" style="height:100px; width: 100%;" class="form-control input_box"  id = "cl5" name="info" placeholder="write something..."></textarea>
                        

                
                        <label for="cl7"><b>Choose an Employee to Assign Task to:</b></label>
<select class="form-control input_box" id="service" name="username_id">


      <?php 

 include_once '../classes/dbc.classes.php';

$database = new Connection();
  $db = $database->openConnection();
  $query = "SELECT username FROM users WHERE u_role=90";
$result = $db->query($query);
 ?>

 <?php
 $sn=1;
 while($data = $result->fetch(PDO::FETCH_ASSOC)) {
   
   ?>
      <option ><?php echo $data['username']; ?> </option>
       
          <?php
  }
  ?> 
     
                         
    </select>

  <input type="submit" name='submit_task' value="submit a new Task">
  <input type="reset" name='Cancel' value="Cancel">
  </form>
</div>

   <!-- end form -->

    <br>

<h1 class="header1">Choose A Task from Tickets Box:</h1>

<!-- tickets table start -->
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
  $query = "SELECT * FROM tickets";
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
  echo "<td class='case0'>"."Awaiting ..." . "</td>";
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
    <br>

<!-- tickets table end -->

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

<!-- script -->
<script>
    
                var table = document.getElementById('table1');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("cl1").value = Number(this.cells[0].innerHTML);
                         document.getElementById("cl2").value = this.cells[3].innerHTML;
                         document.getElementById("cl3").value = this.cells[4].innerHTML;
                         document.getElementById("cl4").value = this.cells[5].innerHTML;
                         document.getElementById("cl5").value = this.cells[6].innerHTML;

                    };
                }
    
         </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#textSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    $("#table1 tr:first").show();
  });
});
</script>

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

<!-- script end-->
</body>
</html>

