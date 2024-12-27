<?php 
require_once('../../app/classes/User.php');
require_once('../../app/helpers/getUser.php');
if(isset($_SESSION['user_role']) && ($_SESSION['user_role'] == "Admin" or $_SESSION['user_role'] == "SuperAdmin")){
    if(isset($_SESSION['added'])){
        echo $_SESSION['added'];
        unset($_SESSION['added']);
    }
  $allUsers = getUser::getAllUsers();
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard | Users</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />



    <style>
        input[type="search"]::-webkit-search-cancel-button {
            -webkit-appearance: none;
        }

        .nav-items {
            position: relative;
        }

        .nav-items::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #5051FA;
            transition: width 0.3s ease;
        }

        .nav-items:hover::after {
            width: 100%;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#5051FA',
                        borderColor: '#5f5d5d',
                        bgcolor: '#F3F3F3',
                    },
                    fontFamily: {
                        // primary: ['Consolas', 'monospace'],
                        primary: ['Playfair Display', 'serif'],
                        // primary: ['EB Garamond', 'serif'],
                        secondary: ['Pattaya', 'sans-serif'],
                    },
                },
            },
        };
    </script>
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
    <a href="activite.php"  class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>&nbsp; Activite</a>
    <a href="reservation.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>&nbsp; Reservation</a>
    <a href="users.php" class="w3-bar-item w3-button w3-padding  w3-blue"><i class="fa fa-users fa-fw"></i>&nbsp; Users</a>
    
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity w3hidd" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div id="main" class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  

  

  <div class="w3-row-padding  w3-padding-16"> 
    <div class="">
        <div class="w3-container w-full ">
        <div>
                <table class="w-full border rounded-lg" >
                    <tr class="bg-gray-200 border-b  items-center ">
                    <td class="text-center w-10 p-4"> <input type="checkbox" name="" id=""></td>
                      <td>&nbsp;Nom</td>
                      <td>&nbsp;Prenom</td>
                      <td>&nbsp;Email</td>
                      <td>&nbsp;Role</td>
                      <td>&nbsp;Action</td>
                    </tr>
                    <?php
                    foreach($allUsers as $row)
                    {
                        $id = htmlspecialchars($row['id_utilisateur']);
                        $nom = htmlspecialchars($row['nom']);
                        $prenom = htmlspecialchars($row['prenom']);
                        $email = htmlspecialchars($row['email']);
                        $role = htmlspecialchars($row['role']);
                        $ban = htmlspecialchars($row['banned']);
                        
                        // Déterminer l'action et le texte du bouton
                        $actionText = $ban ? "Unban" : "Ban";
                        $actionClass = $ban ? "bg-green-500 hover:bg-green-600" : "bg-red-500 hover:bg-red-600";
                        if($_SESSION['user_role'] == "SuperAdmin" )
                        
                        echo "<tr class='hover:bg-gray-100'>
                            <td class='text-center w-10 p-4'><input type='checkbox' name='' id='' ></td>
                            <td>&nbsp;$nom</td>
                            <td>&nbsp;$prenom</td>
                            <td>&nbsp;$email</td>
                            <td>&nbsp;$role</td>
                            <td class='text-center'>
                                <form action='../../app/helpers/banUnban.php' method='POST' class='inline-block'>
                                    <input type='hidden' name='user_id' value='$id'>
                                    <button type='submit' name='$actionText' class='px-4 py-2 text-white $actionClass rounded'>
                                        $actionText
                                    </button>
                                </form>
                            </td>
                        </tr>";
                        else {
                            echo "<tr class='hover:bg-gray-100'>
                            <td class='text-center w-10 p-4'><input type='checkbox' name='' id='' ></td>
                            <td>&nbsp;$nom</td>
                            <td>&nbsp;$prenom</td>
                            <td>&nbsp;$email</td>
                            <td>&nbsp;$role</td>
                            ";
                            if($role == 'Client')
                            echo "
                            <td class='text-center'>
                                <form action='../../app/helpers/banUnban.php' method='POST' class='inline-block'>
                                    <input type='hidden' name='user_id' value='$id'>
                                    <button type='submit' name='$actionText' class='px-4 py-2 text-white $actionClass rounded'>
                                        $actionText
                                    </button>
                                </form>
                            </td>";
                            echo "
                        </tr>";
                        }

                    }
                    
                    
                    ?>
                    
                 </table>
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