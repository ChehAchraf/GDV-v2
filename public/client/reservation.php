<?php
session_start();
if(!isset($_SESSION['id_logged']))
{
    header('Location: /Gestion Restaurant/frontend/index.php');
}
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
            background: #9c7e54;
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
                primary: '#9c7e54',
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
        $allMenu = $con ->query('SELECT * from menu');
        $allReservations = $con->query("SELECT * from reservation where id_client = " .$_SESSION['id_logged']." ");
        
    ?>
    <section class="bg-bgcolor py-16 px-8 text-black">
    <div class="container mx-auto">
        <h2 class="text-[40px] text-center text-black font-bold mb-12">
            Your <span class="text-primary">Reservations</span>
        </h2>

        <!-- Reservation Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 ">

            <?php
                if($allReservations->num_rows > 0){
                    foreach($allReservations as $reservation)
                    {
                        $reservationDate[] = $reservation['date_reservation'];
                        $reservationHeure[] = $reservation['heure_reservation'];

                        echo "<div class='bg-white rounded-lg shadow-lg p-6'>
                <h3 class='text-xl font-bold text-primary mb-4'>Reservation 1</h3>
                <ul class='text-gray-700'>
                    <li><span class='font-bold'>Adresse:</span> ".$reservation['addresse_reservation']."</li>
                    <li><span class='font-bold'>Nombre de Personnes:</span> ".$reservation['nbr_personnes']."</li>
                    <li><span class='font-bold'>Date:</span> ".$reservation['date_reservation']."</li>
                    <li><span class='font-bold'>Heure:</span> ".$reservation['heure_reservation']."</li>
                    <li><span class='font-bold'>Staus:</span> ".$reservation['status']."</li>

                </ul>
                <div class='flex justify-center gap-2'>
                <form class='cancel-form' action='../../backend/actionsPHP/reservation/updateStatus.php' method='POST' >
                        <input type='hidden' name='res-id' value=".$reservation['id'].">
                        <input type='hidden' name='new-status' value='Canceled'>
                            <input type='hidden' name='action' value='confirm'>
";
                        
                        if($reservation['status'] !== 'Canceled')
                        {echo "
                <button name='confirm' class='mt-6 bg-primary text-white py-2 px-4 rounded hover:bg-[#826642] transition duration-300'>
                    Cancel Reservation
                </button>";}
                echo "</form>
                
                        <input type='hidden' name='res-id' value=".$reservation['id'].">   
                        <button name='edit_reservation' onclick=\"openEditModal('".$reservation['id']."', '".$reservation['id_menu']."', '".$reservation['heure_reservation']."', '".$reservation['date_reservation']."', '".$reservation['nbr_personnes']."', '".$reservation['addresse_reservation']."')\" class='mt-6 bg-primary text-white py-2 px-4 rounded hover:bg-[#826642] transition duration-300'>
                            Edit Reservation
                        </button>
              
                         </div>        
            </div>";
                    }
                } else{
                    echo "<p class='text-center w-full '> You don't have any reservation</p>";
                }
            ?>

          

   
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
            <form id="reservation-form" action="../../backend/actionsPHP/reservation/add.php" method="POST">
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Menu</label>
        <select name="menu-select" id="menu-select" class="w-full border border-gray-300 text-gray-600 rounded-md p-2 focus:ring-primary focus:border-primary">
            <option value="" checked>Choose a menu</option>
            <?php
            foreach ($allMenu as $menu) {
                echo "<option value='" . $menu['id'] . "'>" . $menu['titre'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Adresse</label>
        <input 
            name="adresse-reservation"
            id="adresse-reservation"
            type="text" 
            class="w-full border border-gray-300 rounded-md p-2 focus:ring-primary focus:border-primary"
            placeholder="Enter Address"
        >
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
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Date</label>
        <input 
            name="date-reservation"
            id="date-reservation"
            type="date" 
            class="w-full border border-gray-300 rounded-md p-2 text-gray-600 focus:ring-primary focus:border-primary"
        >
    </div>
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Heure</label>
        <input 
            name="heure-reservation"
            id="heure-reservation"
            type="time" 
            class="w-full border border-gray-300 rounded-md text-gray-600 p-2 focus:ring-primary focus:border-primary"
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
            <form id="reservation-form-edit" action="../../backend/actionsPHP/reservation/edit.php" method="POST">
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Menu</label>
        <input type="hidden" id="r-id" name="r-id">
        <select name="menu-select-edit" id="menu-select-edit" class="w-full border border-gray-300 text-gray-600 rounded-md p-2 focus:ring-primary focus:border-primary">
            <option value="" checked>Choose a menu</option>
            <?php
            foreach ($allMenu as $menu) {
                echo "<option value='" . $menu['id'] . "' >" . $menu['titre'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Adresse</label>
        <input 
            name="adresse-reservation-edit"
            id="adresse-reservation-edit"
            type="text" 
            class="w-full border border-gray-300 rounded-md p-2 focus:ring-primary focus:border-primary"
            placeholder="Enter Address"
        >
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
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Date</label>
        <input 
            name="date-reservation-edit"
            id="date-reservation-edit"
            type="date" 
            class="w-full border border-gray-300 rounded-md p-2 text-gray-600 focus:ring-primary focus:border-primary"
        >
    </div>
    <div class="mb-4">
        <label class="block font-bold text-gray-700 mb-2">Heure</label>
        <input 
            name="heure-reservation-edit"
            id="heure-reservation-edit"
            type="time" 
            class="w-full border border-gray-300 rounded-md text-gray-600 p-2 focus:ring-primary focus:border-primary"
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
       const $allCancel = document.querySelectorAll('.cancel-form')
       $allCancel.forEach(cancel => {
        cancel.addEventListener('submit', function(event){
            event.preventDefault()
            console.log('test')
            Swal.fire({
            title: 'Cancel Reservation',
            text: 'Are you sure you want to cancel this reservation?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, Cancel',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(cancel)
                cancel.submit();    
            }
        });
        })

       })
    document.getElementById('reservation-form').addEventListener('submit', function(event) {
        event.preventDefault();

       
        const menuSelect = document.getElementById('menu-select').value;
        const address = document.getElementById('adresse-reservation').value.trim();
        const numberOfPeople = document.getElementById('nbr-personne-reservation').value;
        const datee = document.getElementById('date-reservation').value;
        const time = document.getElementById('heure-reservation').value;

      
        const addressRegex = /^[a-zA-Z0-9\s,.'-]{3,}$/;

        if (!menuSelect) {
            Swal.fire('Error', 'Please select a menu.', 'error');
            return;
        }
        if (!addressRegex.test(address)) {
            Swal.fire('Error', 'Please enter a valid address.', 'error');
            return;
        }
        if (numberOfPeople <= 0) {
            Swal.fire('Error', 'Number of people must be greater than 0.', 'error');
            return;
        }
        if (!datee ||  new Date(datee).getTime() < Date.now()) {
            Swal.fire('Error', 'Please select a valide date.', 'error');
            return;
        } 
  
           
        if (!time) {
            Swal.fire('Error', 'Please select a time.', 'error');
            return;
        }
        const allDate = <?php echo json_encode($reservationDate) ?>;
        // console.log(allDate)
        // console.log(allDate.includes(datee))
        const allHeure = <?php echo json_encode($reservationHeure) ?>;
        if(allDate.includes(datee) == true)
        {
            console.log(allHeure)
            console.log(time)
        console.log(allHeure.includes(time))
            if(allHeure.includes(time+":00") == true)
                {
                    Swal.fire('Error', 'There already a reservation on this date and time choose another time', 'error');
                    return;
                }
        }

        
        Swal.fire({
            title: 'Confirm Reservation',
            text: 'Are you sure you want to confirm this reservation?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('reservation-form').submit();
            }
        });
    });
    document.getElementById('reservation-form-edit').addEventListener('submit', function(event) {
        event.preventDefault();

       
        const menuSelect = document.getElementById('menu-select-edit').value;
        const address = document.getElementById('adresse-reservation-edit').value.trim();
        const numberOfPeople = document.getElementById('nbr-personne-reservation-edit').value;
        const datee = document.getElementById('date-reservation-edit').value;
        const time = document.getElementById('heure-reservation-edit').value;

      
        const addressRegex = /^[a-zA-Z0-9\s,.'-]{3,}$/;

        if (!menuSelect) {
            Swal.fire('Error', 'Please select a menu.', 'error');
            return;
        }
        if (!addressRegex.test(address)) {
            Swal.fire('Error', 'Please enter a valid address.', 'error');
            return;
        }
        if (numberOfPeople <= 0) {
            Swal.fire('Error', 'Number of people must be greater than 0.', 'error');
            return;
        }
        if (!datee || new Date(datee).getTime() < Date.now()) {
            Swal.fire('Error', 'Please select a valide date.', 'error');
            return;
        } 
  
           
        if (!time) {
            Swal.fire('Error', 'Please select a time.', 'error');
            return;
        }
        const allDate = <?php echo json_encode($reservationDate) ?>;
        // console.log(allDate)
        // console.log(allDate.includes(datee))
        const allHeure = <?php echo json_encode($reservationHeure) ?>;
        if(allDate.includes(datee) == true)
        {
            console.log(allHeure)
            console.log(time)
        console.log(allHeure.includes(time))
            if(allHeure.includes(time+":00") == true)
                {
                    Swal.fire('Error', 'There already a reservation on this date and time choose another time', 'error');
                    return;
                }
        }

        
        Swal.fire({
            title: 'Modify Reservation',
            text: 'Are you sure you want to confirm this Modification?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('reservation-form-edit').submit();
            }
        });
    });

    function openEditModal(id,idMenu,heure_reservation,date_reservation,nbrPersonnes,address){
        const modalEdit = document.getElementById('reservationModal-edit');
        modalEdit.classList.remove('hidden');
        document.getElementById('')
        document.getElementById('r-id').value = id
        document.getElementById('heure-reservation-edit').value = heure_reservation
        document.getElementById('date-reservation-edit').value = date_reservation
        document.getElementById('nbr-personne-reservation-edit').value = nbrPersonnes
        document.getElementById('adresse-reservation-edit').value = address
        document.getElementById('menu-select-edit').value = idMenu
    }
</script>

        
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