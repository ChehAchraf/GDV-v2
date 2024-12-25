<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        input[type="search"]::-webkit-search-cancel-button {
            -webkit-appearance: none;
        }
        td {
            border-bottom-width: 1px;
            border-collapse: collapse;
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
                        primary: ['Playfair Display', 'serif'],
                        secondary: ['Pattaya', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>

<body>
<div class="flex min-h-screen h-full">
    <aside class="w-52 border-r min-h-full flex flex-col items-center gap-16">
        <div class="mt-16">
            <img class="w-32" src="../image/logo2.png" alt="logo">
        </div>
        <div>
            <div class="grid gap-4 w-[100%]">
                <a href="index.php" class="flex gap-4 px-4 py-2 rounded-2xl"><img src="./img/home.svg" alt=""> Dashboard </a>
                <a href='menu.php' class='flex gap-4 px-4 py-2 rounded-2xl'><img src='./img/briefcase.svg' alt=''> Menu </a>
                <a href='reservation.php' class='flex gap-4 px-4 py-2 rounded-2xl'><img id='btn-icon' class='mt-1' src='./img/3 User.svg' alt=''> Reservations</a>
            </div>
        </div>
    </aside>
    <div class="grow">
        <header class="h-20 border-b">
            <nav class="h-full flex justify-between mx-8 items-center">
                <div class="flex gap-2">
                    <img src="./img/Search.svg" alt="">
                    <input class="search outline-none border-none w-64 px-4 py-2 rounded-2xl" type="search" name="search-input" id="search-input" placeholder="Search anything here">
                </div>
                <div class="flex w-72 justify-between items-center">
                    <img class="cursor-pointer" src="./img/settings.svg" alt="">
                    <img class="cursor-pointer" src="./img/Icon.svg" alt="">
                    <form action="../../backend/actionsPHP/logout.php" method="post">
                        <button><img src="img/logout.png" class="h-4 w-4" alt=""></button>
                    </form>
                    <div class="flex items-center gap-2 cursor-pointer">
                        <div class="cursor-pointer w-10 h-10 bg-[url('img/Ana.jpg')] bg-cover rounded-full text-white relative">
                            <div class="bg-[#228B22] h-3 w-3 rounded-full absolute bottom-0 right-0"></div>
                        </div>
                        <p class="text-[#606060] font-bold">Admin Name</p>
                    </div>
                </div>
            </nav>
        </header>

        <section class="p-4 w-full flex flex-col gap-8">
            <!-- Dashboard Heading -->
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-[#9c7e54]">Statistiques du Jour</h2>
                <p class="text-gray-600">Bienvenue, Chef !</p>
            </div>

            <!-- Statistiques Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="flex flex-col items-center p-4 bg-yellow-500 text-white rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Demandes en Attente</h3>
                    <p class="text-3xl font-bold mt-2">5</p>
                </div>

                <div class="flex flex-col items-center p-4 bg-green-500 text-white rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Demandes Approuvées Aujourd'hui</h3>
                    <p class="text-3xl font-bold mt-2">10</p>
                </div>

                <div class="flex flex-col items-center p-4 bg-blue-500 text-white rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Demandes Approuvées pour Demain</h3>
                    <p class="text-3xl font-bold mt-2">3</p>
                </div>

                <div class="flex flex-col items-center p-4 bg-[#9c7e54] text-white rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Clients Inscrits</h3>
                    <p class="text-3xl font-bold mt-2">150</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-bold text-[#9c7e54]">Next Client</h3>
                <div class="mt-4">
                    <p><span class="font-bold">Name :</span> John Doe</p>
                    <p><span class="font-bold">Heure de Réservation :</span> 14:30</p>
                    <p><span class="font-bold">Adresse :</span> 123 Street, City</p>
                </div>
            </div>
        </section>
    </div>
</div>

</body>
</html>
