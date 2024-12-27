<?php
require_once('../../app/classes/User.php');
require_once('../../app/helpers/getActivite.php');
$allActivites = getActivite::getAllActivites();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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
</head>

<body class="w-full h-full min-h-screen text-white font-primary ">
    <?php include 'header.php';

    ?>
    <section class="flex flex-col w-full h-full p-4 md:p-32 items-center justify-center text-black">
        <h1 class="text-[50px] ">Our <span class='text-primary font-bold'>Menu</span></h1>
    
        <div class="flex flex-wrap h-[100%] w-[100%] justify-around gap-8 pt-8">
        <div class="container mx-auto p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php foreach ($allActivites as $activite): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Placeholder image, replace with your own image field if available -->
                    <img src="../image/static.jpg" alt="Activity Image" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($activite['titre']); ?></h3>
                        <p class="text-gray-600 mt-2"><?php echo htmlspecialchars($activite['description']); ?></p>
                        <p class="mt-4 text-gray-800"><strong>Price:</strong> $<?php echo number_format($activite['prix'], 2); ?></p>
                        <p class="mt-1 text-gray-600"><strong>Available Spots:</strong> <?php echo $activite['places_disponibles']; ?></p>
                        <p class="mt-1 text-gray-600"><strong>Type:</strong> <?php echo $activite['type']; ?></p>
                        <p class="mt-1 text-gray-600"><strong>Start Date:</strong> <?php echo date("F j, Y", strtotime($activite['date_debut'])); ?></p>
                        <p class="mt-1 text-gray-600"><strong>End Date:</strong> <?php echo date("F j, Y", strtotime($activite['date_fin'])); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
        </div>
        </div>

    </section>

    <?php include 'footer.php'  ;?>
    <script>
        function openBookModal() {
            <?php
                if (!isset($_SESSION['id_logged'])) {
                header('Location: Gestion Restaurant/frontend/index.php');
            }
                ?>
                console.log('aa')
        }
    </script>

</body>

</html>