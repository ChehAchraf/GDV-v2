<?php

require_once ('../../app/helpers/getAllReservations.php');
require_once ('../../app/helpers/getActivite.php');
session_start();
if(!isset($_SESSION['id']))
{
    header('Location: /GV2/public/client/home.php');
}
$logged_id=$_SESSION['id'];
$reservations = getAllReservations::getMyReservations($logged_id);
$allActivites = getActivite::getAllActivites();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <style >
       
        input[type="search"]::-webkit-search-cancel-button
        {
        -webkit-appearance:none;
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
</head>
<body class="w-full h-full min-h-screen text-white font-primary ">
    <?php include 'header.php'; 
   
        
    ?>
    <section class="bg-bgcolor py-16 px-8 text-black">
    <div class="container mx-auto">
        <h2 class="text-[40px] text-center text-black font-bold mb-12">
            Your <span class="text-primary">Reservations</span>
        </h2>

        <!-- Reservation Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 ">

            	<?php

                    if($reservations)
                    {
                       
                        $cmp = 1;
                        foreach($reservations as $res)
                        {
                            $act  = getActivite::getActiviteById($res['id_activite']);
                            echo "
                     <div class='bg-white rounded-lg shadow-lg p-6'>
                                <h3 class='text-xl font-bold text-primary mb-4'>Reservation $cmp</h3>
                                <ul class='text-gray-700'>
                                    <li><span class='font-bold'>Activite:</span> ".$act['titre']."</li>
                                    <li><span class='font-bold'>Description:</span> ".$act['description']."</li>
                                    <li><span class='font-bold'>Nombre de Personnes:</span>  ".$res['nbr_personne']."</li>
                                    <li><span class='font-bold'>Date Reservation:</span>  ".$res['date_reservation']."</li>
                                    <li><span class='font-bold'>Date Activite:</span>  ".$act['date_debut']."</li>
                                    <li><span class='font-bold'>Staus:</span> ".$res['statut']."</li>

                                </ul>
                                <div class='flex justify-center gap-2'>
                                ";
                                if($res['statut'] != 'Annulée')
                                { echo"
                                <form class='cancel-form' action='../../app/helpers/CancelReservation.php' method='POST' >
                                        <input type='hidden' name='res-id' value=".$res['id_reservation'].">
                                            <input type='hidden' name='action' value='confirm'>                
                                <button name='confirm' class='mt-6 bg-primary text-white py-2 px-4 rounded hover:bg-[#826642] transition duration-300'>
                                    Cancel Reservation
                                </button>
                                </form>";}
                                echo "
                                        <input type='hidden' name='res-id' value=".$res['id_reservation'].">   
                                        <button name='edit_reservation'   onclick=\"openEditModal('".$res['id_reservation']."', '".$res['id_activite']."', '".$res['nbr_personne']."')\"   class='mt-6 bg-primary text-white py-2 px-4 rounded hover:bg-[#826642] transition duration-300'>
                                            Edit Reservation
                                        </button>
                            
                                        </div>        
                            </div>";
                            
                            
                        
                        $cmp = $cmp+1;
                        }

                    } else 
                    {
                        echo "  <p class='text-center w-full '> You don't have any reservation</p>";
                    }
                ?>
              
            
            
            <script>
                    function openEditModal(id,idActivite,nbrPersonnes){
                    const modalEdit = document.getElementById('reservationModal-edit');
                    modalEdit.classList.remove('hidden');
                    document.getElementById('')
                    document.getElementById('r-id').value = id
                    document.getElementById('nbr-personne-reservation-edit').value = nbrPersonnes
                    document.getElementById('activite-select-edit').value = idActivite
                }
         </script>
          

   
        </div>

        <!-- Add Reservation Button -->
        <div class="text-center mt-16">
            <button 
                onclick="toggleModal()" 
                class="bg-primary text-white py-3 px-6 rounded-lg text-lg hover:bg-[#826642] transition duration-300">
                Make a New Reservation
            </button>
        </div>
    </div>

    <!-- Reservation Modal -->
    <div id="reservationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-8 shadow-lg w-[90%] md:w-[50%]">
            <h3 class="text-2xl font-bold text-primary mb-6">New Reservation</h3>
            <form id="reservation-form" action="../../app/helpers/addReservation.php" method="POST">
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Activite</label>
        
        <select name="activite-select" id="activite-select" class=" w-full border border-gray-300 text-gray-600 rounded-md p-2 focus:ring-primary focus:border-primary">
            <option value="" checked>Choose an Activity</option>
                    <?php
                    foreach($allActivites as $activite)
                    echo "<option value='".$activite['id_activite']."'>".$activite['titre']." (".$activite['type'].")</option>";
                    ?>
                
           
        </select>
    </div>
   
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Nombre de Personnes</label>
        <input 
            name="nbr-personne-reservation"
            id="nbr-personne-reservation"
            type="number" 
            class="w-full border border-gray-300 rounded-md p-2 focus:ring-primary focus:border-primary"
            placeholder="Enter Number of People"
        >
    </div>
   
    <div class="flex justify-end space-x-4">
        <button 
            type="button" 
            onclick="toggleModal()" 
            class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition duration-300">
            Cancel
        </button>
        <button 
            id="submit-button"
            type="submit" 
            class="bg-primary text-white py-2 px-4 rounded hover:bg-[#826642] transition duration-300">
            Confirm Reservation
        </button>
    </div>
</form>
        </div>
        </div>
        <div id="reservationModal-edit" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 text-black hidden ">
        <div class="bg-white rounded-lg p-8 shadow-lg w-[90%] md:w-[50%]">
            <h3 class="text-2xl font-bold text-primary mb-6">Modify Reservation</h3>
            <form id="reservation-form-edit" action="../../app/helpers/editReservation.php" method="POST">
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Reservation</label>
        <input type="hidden" id="r-id" name="r-id">
        <select name="activite-select-edit" id="activite-select-edit" class=" w-full border border-gray-300 text-gray-600 rounded-md p-2 focus:ring-primary focus:border-primary">
            <option value="" checked>Choose an Activity</option>
                    <?php
                    foreach($allActivites as $activite)
                    echo "<option value='".$activite['id_activite']."'>".$activite['titre']." (".$activite['type'].")</option>";
                    ?>
                
           
        </select>
    </div>
    
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Nombre de Personnes</label>
        <input 
            name="nbr-personne-reservation-edit"
            id="nbr-personne-reservation-edit"
            type="number" 
            class="w-full border border-gray-300 rounded-md p-2 focus:ring-primary focus:border-primary"
            placeholder="Enter Number of People"
        >
    </div>
   
    <div class="flex justify-end space-x-4">
        <button 
            type="button" 
            onclick="toggleEditModal()" 
            class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition duration-300">
            Cancel
        </button>
        <button 
            id="submit-button-edit"
            type="submit" 
            class="bg-primary text-white py-2 px-4 rounded hover:bg-[#826642] transition duration-300">
            Modify Reservation
        </button>
    </div>
</form>
        </div>
        </div>



        
</section>

<script>
    function toggleModal() {
        const modal = document.getElementById('reservationModal');
        modal.classList.toggle('hidden');
    }
    function toggleEditModal() {
        const modalEdit = document.getElementById('reservationModal-edit');
        modalEdit.classList.toggle('hidden');
    }
</script>


    <?php include 'footer.php';?>
    
</body>
</html>