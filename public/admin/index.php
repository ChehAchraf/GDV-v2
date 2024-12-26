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
    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>&nbsp; Admin</a>
    <a href="activite.php"  class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>&nbsp; Activite</a>
    <a href="reservation.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>&nbsp; reservation</a>
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
            <div class="w3-card-4 w3-padding-32 w3-margin-top w3-round w3-container">
            <form action="../inc/add_activity.php" method="POST">

                <label for="titre">Event Title (Titre):</label><br>
                <input class="w3-input w3-border w3-round" type="text" id="titre" name="titre" required><br><br>

                <label for="description">Description:</label><br>
                <textarea class="w3-input w3-border w3-round" id="description" name="description" rows="4" required></textarea><br><br>

                <label for="destination">Destination:</label><br>
                <input class="w3-input w3-border w3-round" type="text" id="destination" name="destination" required><br><br>

                <label for="prix">Price (Prix):</label><br>
                <input class="w3-input w3-border w3-round" type="number" id="prix" name="prix" required min="0" step="0.01"><br><br>

                <label for="date_debut">Start Date (Date de Début):</label><br>
                <input class="w3-input w3-border w3-round" type="date" id="date_debut" name="date_debut" required><br><br>

                <label for="date_fin">End Date (Date de Fin):</label><br>
                <input class="w3-input w3-border w3-round" type="date" id="date_fin" name="date_fin" required><br><br>

                <label for="places_disponible">Available Places (Places Disponibles):</label><br>
                <input class="w3-input w3-border w3-round" type="number" id="places_disponible" name="places_disponible" required min="1"><br><br>

                <button type="submit" class="w3-btn w3-blue w3-round">Add Event</button>
            </form>
            </div>
        </div>
    </div>
    <div class="w3-half">
        <div class="w3-container">
            <h3>Make a Reservation</h3>
            <div class="w3-card-4 w3-padding-32 w3-margin-top w3-round w3-container">
                <form action="../inc/process_reservation.php" method="POST">

                    <label for="client_id">Select Client:</label><br>
                    <select class="w3-input w3-border w3-round" id="client_id" name="client_id" required>
                        <option value="" disabled selected>Select a Client</option>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <option value="<?php echo $row['id_client'] ?>"><?php echo $row['nom'] ." ".  $row['prenom'] ?></option>
                        <?php endwhile?>
                    </select><br><br>
                    <label for="activity_id">Select Activity:</label><br>
                    <select class="w3-input w3-border w3-round" id="activity_id" name="activity_id" required>
                        <option value="" disabled selected>Select an Activity</option>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <option value="<?php echo $row['id_activite'] ?>"><?php echo $row['titre'] ?></option>
                        <?php endwhile ?>
                    </select><br><br>

                    <button type="submit" class="w3-btn w3-blue w3-round">Make Reservation</button>
                </form>
            </div>
        </div>
    </div>
    <div class="w3-half">
        <div class="w3-container">
            <h3>Confirm Reservations</h3>
            <div class="w3-card-4 w3-padding-32 w3-margin-top w3-round w3-container">


            
            <form action="../inc/edit_act_status.php" method="POST">
              <table class="w3-table w3-bordered">
                  <tr>
                      <th>Client Name</th>
                      <th>Activity</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>

                  <tr>
                      <td><?php echo $row['nom'] ?></td> 
                      <td><?php echo $row['titre'] ?></td> 
                      <td><?php echo $row['status'] ?></td> 
                      <td>
                          <select name='status[<?php echo $row['id_reservation']; ?>]' class='w3-select w3-border w3-round'>
                              <option value='En attente' <?php echo ($row['status'] == 'En attente' ? 'selected' : ''); ?>>En attente</option>
                              <option value='Confirmée' <?php echo ($row['status'] == 'Confirmée' ? 'selected' : ''); ?>>Confirmée</option>
                              <option value='Annulée' <?php echo ($row['status'] == 'Annulée' ? 'selected' : ''); ?>>Annulée</option>
                          </select>
                      </td>
                  </tr>

              </table>
              <br>
              <button type="submit" class="w3-btn w3-blue w3-round">Update Status</button>
            </form>
            </div>
        </div>
    </div>
  </div>
  <div class="w3-row w3-container w3-row-padding w3-margin-top">
    <h2>Maanage the reservations</h2>
            <div class="w3-col l3 m6 s12 ">
                <div class="w3-card-4 w3-hover-shadow-xl w3-margin-bottom w3-round">
                    <div class="w3-container w3-padding">
                        <!-- Title -->
                        <h3 class="w3-text-gray"><?php echo $row['titre']; ?></h3>

                        <!-- Date -->
                        <p class="w3-small w3-text-gray"><?php echo $row['date_debut']; ?> - <?php echo $row['date_fin']; ?></p>

                        <!-- Number of clients reserved -->
                        <p class="w3-small w3-text-gray">Reserved: 4 clients</p>

                        <!-- Delete Button -->
                        <a href="../inc/delete_res.php?id=<?php echo $row['id_reservation'] ?>" 
                           class="w3-btn w3-red w3-round w3-small w3-margin-top w3-block w3-hover-opacity">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
  </div>

  <div class="w3-row w3-container w3-row-padding w3-margin-top">
    <h2>Maanage the Clients</h2>
          <div class="w3-col l3 m6 s12">
                <div class="w3-card-4 w3-border w3-border-gray-200 w3-round w3-shadow-md w3-margin-bottom">
                    <!-- User Avatar -->
                    <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Avatar" class="w3-img w3-round-top" style="height: 200px; width: 100%; object-fit: cover;">
                    <div class="w3-container w3-padding">
                        <h2 class="w3-text-gray"><?php echo $row['nom']; ?></h2>

                        <p class="w3-small w3-text-gray">Email: <?php echo $row['email']; ?></p>

                        <p class="w3-small w3-text-gray">Phone: <?php echo $row['telephone']; ?></p>

                        <a href="../inc/delete_users.php?id=<?php echo $row['id_client'] ?>" 
                           class="w3-text-red w3-small w3-hover-opacity w3-underline">
                            Delete
                        </a>
                    </div>
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