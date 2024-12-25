<?php 
include('../inc/db.php');
  session_start();
  if(isset($_SESSION['added'])){
    echo $_SESSION['added'];
    unset($_SESSION['added']);
  }
  if(isset($_SESSION['changed'])){
    echo $_SESSION['changed'];
    unset($_SESSION['changed']);
  }
  $sql = "SELECT COUNT(*) FROM `cliente`";
  $result = $conn->query($sql);
  $row = $result->fetch_row();

  $cmd = "SELECT COUNT(*) FROM `activite`";
  $do = $conn->query($cmd);
  $row_activity = $do->fetch_row();
  ?>
<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
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
  <span class="w3-bar-item w3-right">Logo</span>
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
    <a href="index.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>&nbsp; Overview</a>
    <a href="notif.php" class="w3-bar-item w3-button w3-padding w3-blue "><i class="fa fa-eye fa-fw"></i>&nbsp; Views</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>&nbsp; Traffic</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>&nbsp; Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>&nbsp; Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>&nbsp; News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>&nbsp; General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>&nbsp; History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>&nbsp; Settings</a><br><br>
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
          <h3><?php echo $do == true ? $row_activity[0] : 0 ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Events</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $result == true ? $row[0] : 0 ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>
  <?php
    $sql ="SELECT c.id_client, c.nom, c.prenom, c.email, c.telephone, c.adresse, c.date_naissance
          FROM cliente c
          LEFT JOIN reservation r ON c.id_client = r.id_client
          WHERE r.id_reservation IS NULL;";
          $result = $conn->query($sql);
  ?>
<div class="w3-row w3-container w3-row-padding w3-margin-top">
    <h2>Maanage the Clients</h2>
    <div class="w3-panel w3-blue">
      <h3>Look Here !</h3>
      <p>These Clients doesn't have any reservation : </p>
    </div>
    <table class="w3-table-all">
    <thead>
      <tr class="w3-light-grey w3-hover-red">
        <th>Full Name</th>
        <th>Phone Number</th>
        <th>Email</th>
      </tr>
    </thead>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr class="w3-hover-green">
      <td><?php echo $row['nom'] . $row['prenom'] ?></td>
      <td><?php echo $row['telephone'] ?></td>
      <td><?php echo $row['email'] ?></td>
    </tr>
    <?php endwhile ?>
  </table>
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

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
  <script src="../js/main.js"></script>
</body>
</html>