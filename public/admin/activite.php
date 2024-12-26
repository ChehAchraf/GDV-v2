<?php 
require_once('../../app/classes/User.php');
if(isset($_SESSION['user_role']) && ($_SESSION['user_role'] == "Admin" or $_SESSION['user_role'] == "SuperAdmin")){
    if(isset($_SESSION['added'])){
        echo $_SESSION['added'];
        unset($_SESSION['added']);
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard | Activite</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> &nbsp;Menu</button>
    <?php
          if(isset($_SESSION['id']))
          {
              echo' <form action="../../app/helpers/logout.php" method="post"><button style="cursor:pointer" name="submit" class="w3-bar-item w3-right w3-black w3-hover-red">Logout</button></form>';
          }
    ?>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/avatar.png " class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Mike</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>&nbsp; Admin</a>
    <a href="activite.php"  class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-eye fa-fw"></i>&nbsp; Activite</a>
    <a href="reservation.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>&nbsp; reservation</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity w3hidd" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div id="main" class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Events</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>

  <div class="w3-row-padding  w3-padding-16"> 
    <div class="w3-half">
        <div class="w3-container">
            <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "SuperAdmin"): ?>
            <h3>Create Client</h3>
            <div class="w3-card-4 w3-padding-32 w3-margin-top w3-round w3-container">
                <form action="../../app/helpers/create_user.php" method="POST" >
                    
                    <label for="nom">First Name (Nom):</label><br>
                    <input class="w3-input w3-border w3-round" type="text" id="nom" name="nom" required><br><br>

                    <label for="prenom">Last Name (Prenom):</label><br>
                    <input class="w3-input w3-border w3-round" type="text" id="prenom" name="prenom" required><br><br>

                    <label for="email">Email:</label><br>
                    <input class="w3-input w3-border w3-round" type="email" id="email" name="email" required><br><br>

                    <label for="password">Password (mot de pass):</label><br>
                    <input class="w3-input w3-border w3-round" type="tel" id="password" name="password" required><br><br>

                    <label for="role">Select Admin role : </label>
                    <select name="role" id="role">
                        <option value="SuperAdmin">Super Admin</option>
                        <option value="Admin">Admin</option>
                    </select>

                    <button type="submit" class="w3-btn w3-blue w3-round">Add Client</button>
                </form>
                
            </div>
            <?php endif ?>
        </div>
    </div>
    <div class="w3-half">
        <div class="w3-container">
            <h3>Create Event</h3>

            <!-- Ktab Hna ach bghiti asat -->

        </div>
    </div>
    <div class="w3-half">
        <div class="w3-container">
            <h3>Make a Reservation</h3>
            
            <!-- 7ta hna ktab ach bghiti db hado half which means 50% mn ay container kifma kan lwidth dyalo -->


        </div>
    </div>
    <div class="w3-half">
        <div class="w3-container">
           
                <!-- ta hada half mais ghaynzl lta7t 7it deja 100% tkhdat mn 9blo -->

        </div>
    </div>
  </div>

  <hr>
  <br>


  <!-- End page content -->   
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
  <script src="../js/main.js"></script>
</body>
</html>
<?php }else{
   header("Location: ../");
}?>