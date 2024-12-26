<?php 
require_once('../../app/classes/User.php');
require_once('../../app/helpers/getActivite.php');
if(isset($_SESSION['user_role']) && ($_SESSION['user_role'] == "Admin" or $_SESSION['user_role'] == "SuperAdmin")){
    if(isset($_SESSION['added'])){
        echo $_SESSION['added'];
        unset($_SESSION['added']);
    }
  $allActivtites = getActivite::getAllActivites();
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
    <a href="activite.php"  class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-eye fa-fw"></i>&nbsp; Activite</a>
    <a href="reservation.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>&nbsp; reservation</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity w3hidd" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div id="main" class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  

  <div class="w3-row-padding w3-margin-bottom pt-16">
    <div class="w3-quarter">
    <button id="addActivityBtn" class="flex justify-end w3-container w3-blue w3-padding-16 rounded-xl hover:text-blue">
        Add Activity
    </button>
    </div>
    
  </div>

  <div class="w3-row-padding  w3-padding-16"> 
    <div class="">
        <div class="w3-container w-full ">
        <div>
                <table class="w-full border rounded-lg" >
                    <tr class="bg-gray-200 border-b  items-center ">
                    <td class="text-center w-10 p-4"> <input type="checkbox" name="" id=""></td>
                      <td>&nbsp;Titre</td>
                      <td>&nbsp;Description</td>
                      <td>&nbsp;Price</td>
                      <td>&nbsp;Date Debut</td>
                      <td>&nbsp;Date Fin</td>
                      <td>&nbsp;Places Disponibles</td>
                      <td>&nbsp;Type</td>
                      <td>&nbsp;Action</td>
                    </tr>
                    <?php
                    foreach($allActivtites as $row)
                    {
                        $id=htmlspecialchars($row['id_activite']);
                        $titre = htmlspecialchars($row['titre']);
                        $description = htmlspecialchars($row['description']);
                        $prix = htmlspecialchars($row['prix']);
                        $date_debut = htmlspecialchars($row['date_debut']);
                        $date_fin = htmlspecialchars($row['date_fin']);
                        $places_disponibles = htmlspecialchars($row['places_disponibles']);
                        $type = htmlspecialchars($row['type']);

                        echo " <tr class='hover:bg-gray-100'>
                        <td class='text-center w-10 p-4'> <input type='checkbox' name='' id='' ></td>
                        <td>&nbsp;$titre</td>
                        <td>&nbsp;$description</td>
                        <td>&nbsp;$prix</td>
                        <td>&nbsp;$date_debut</td>
                        <td>&nbsp;$date_fin</td>
                        <td>&nbsp;$places_disponibles</td>
                         <td>&nbsp;$type</td>


                    <td>
                        <div class='flex items-center gap-2 pl-2'>
                        <a href='../../app/helpers/deleteActivite.php?id= ".$id."'><img class='h-4 w-4' src='./img/delete.png' alt=''></a>
                      <button 
                          class='edit-button' 
                          data-id=' $id ' 
                          data-titre=' $titre ' 
                          data-description=' $description ' 
                          data-prix=' $prix ' 
                          data-date_debut=' $date_debut ' 
                          data-date_fin=' $date_fin ' 
                          data-type=' $type ' 
                          data-places_disponibles=' $places_disponibles '>
                          <img class='h-4 w-4' src='/GV2/public/admin/img/editinggh.png' alt='Edit'>
                      </button>
                        </div>
                    </td>
                    </tr> ";
                   
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
<div id="activityModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-lg transform h-[70%] overflow-y-auto scale-90 transition-transform">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Add Activity</h2>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <form id="addActivityForm" action="../../app/helpers/addActivite.php" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium">Title</label>
                    <input type="text" name="titre" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Description</label>
                    <textarea name="description" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" rows="3" required></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium">Price</label>
                    <input type="number" name="prix" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Start Date</label>
                    <input type="date" name="dateDebut" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">End Date</label>
                    <input type="date" name="dateFin" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Available Places</label>
                    <input type="number" name="placesDisponibles" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Type</label>
                    <select name="type" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                        <option value="Vol">Vol</option>
                        <option value="Circuit">Circuit</option>
                        <option value="Hotel">Hotel</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                    Save Activity
                </button>
            </form>
        </div>
    </div>
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-lg transform scale-90 transition-transform">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Edit Activity</h2>
            <button id="closeEditModal" class="text-gray-400 hover:text-gray-600">&times;</button>
        </div>
        <form id="editActivityForm" action="../../app/helpers/editActivitie.php" method="POST" class="space-y-4">
            <input type="hidden" name="id-edit" id="edit-id">
            <div>
                <label class="block text-sm font-medium">Title</label>
                <input type="text" name="titre-edit" id="edit-titre" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Description</label>
                <textarea name="description-edit" id="edit-description" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" rows="3" required></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium">Price</label>
                <input type="text" name="prix-edit" id="edit-prix" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Start Date</label>
                <input type="date" name="dateDebut-edit" id="edit-date_debut" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block text-sm font-medium">End Date</label>
                <input type="date" name="dateFin-edit" id="edit-date_fin" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Places Available</label>
                <input type="number" name="placesDisponibles-edit" id="edit-places_disponibles" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                    <label class="block text-sm font-medium">Type</label>
                   <select name="type-edit" id="type-edit" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                        <option value="Vol">Vol</option>
                        <option value="Circuit">Circuit</option>
                        <option value="Hotel">Hotel</option>
                    </select> 
                </div>
            <button type="submit" name="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Save Changes</button>
        </form>
    </div>
</div>
<script>
function openEditModal(id, titre, description, prix, dateDebut, dateFin, placesDisponibles,type) {
    // Populate form fields with activity data
    document.getElementById("edit-id").value = id;
    document.getElementById("edit-titre").value = titre;
    document.getElementById("edit-description").value = description;
  
    document.getElementById("type-edit").value = type.trim();
    document.getElementById("edit-prix").value = parseFloat(prix).toFixed(2);
    document.getElementById("edit-date_debut").value = new Date(dateDebut).toISOString().split('T')[0];
    document.getElementById("edit-date_fin").value = new Date(dateFin).toISOString().split('T')[0];
    document.getElementById("edit-places_disponibles").value = parseInt(placesDisponibles, 10);


    // Show modal with animation
    editModal.classList.remove("hidden");
    setTimeout(() => editModal.classList.add("scale-100"));
}

// Close the modal
closeEditModal.addEventListener("click", () => {
    editModal.classList.add("hidden");
    editModal.classList.remove("scale-100");
});

// Attach event listeners to edit buttons
document.querySelectorAll(".edit-button").forEach(button => {
    button.addEventListener("click", (event) => {
        const { id, titre, description, prix, date_debut, date_fin, places_disponibles,type } = button.dataset;
        openEditModal(id, titre, description, prix, date_debut, date_fin, places_disponibles,type);
    });
});

   const addActivityBtn = document.getElementById('addActivityBtn');
        const activityModal = document.getElementById('activityModal');
        const closeModal = document.getElementById('closeModal');
        const addActivityForm = document.getElementById('addActivityForm');

        // Show Modal
        addActivityBtn.addEventListener('click', () => {
            activityModal.classList.remove('hidden');
            setTimeout(() => {
                activityModal.firstElementChild.classList.remove('scale-90');
            }, 50);
        });

        // Hide Modal
        closeModal.addEventListener('click', () => {
            activityModal.firstElementChild.classList.add('scale-90');
            setTimeout(() => {
                activityModal.classList.add('hidden');
            }, 200);
        });
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