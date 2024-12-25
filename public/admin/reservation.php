<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation-Admin</title>
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
    <aside class="w-52 border-r min-h-full flex flex-col items-center gap-16 ">
        <div class="mt-16">
            <img class="w-32" src="../image/logo2.png" alt="logo">
        </div>
        <div class="">
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
                <div class="flex w-72 justify-between items-center ">
                    <img class="cursor-pointer" src="./img/settings.svg" alt="">
                    <img class="cursor-pointer" src="./img/Icon.svg" alt="">
                    <form action="../../backend/actionsPHP/logout.php" action="post">
                        <button><img src="img/logout.png" class="h-4 w-4" alt=""></button>
                    </form>
                    <div class="flex items-center gap-2 cursor-pointer">
                        <div class="cursor-pointer w-10 h-10 bg-[url('img/Ana.jpg')] bg-cover rounded-full text-white relative">
                            <div class="bg-[#228B22] h-3 w-3 rounded-full absolute bottom-0 right-0"></div>
                        </div>
                        <p class="text-[#606060] font-bold">Hamza GBOURI</p>
                    </div>
                </div>
            </nav>
        </header>
       
    <section class="p-4 w-full flex flex-col gap-8">
        <div class="flex justify-between items-center px-8">
            <h1>
                Reservation
            </h1>
           <div class="flex gap-4">
                <button class="flex gap-2 items-center border px-4 py-2 rounded-lg text-[#0E2354] ">
                    <img src="./img/Downlaod.svg" alt="">Export
                </button>
            </div>
        </div>

        <div class="flex justify-between items-center px-4 border py-4 rounded-lg">
            <div class="flex gap-2">
                <img src="./img/Search.svg" alt="">
                <input class="search outline-none border-none w-72 px-4 py-2 rounded-2xl" type="search" name="search-input" id="search-input" placeholder="Search reservation by name...">
            </div>
           <div class="flex gap-4 items-center">
                <button class="flex gap-2 items-center border px-4 py-2 rounded-lg">
                    <img src="./img/Filters lines.svg" alt="">Filters
                </button>
                <div class="flex gap-2">
                    <img class="px-4 py-3 border rounded-lg cursor-pointer" src="./img/Vector.svg" alt="">
                    <img class="px-4 py-2 border rounded-lg cursor-pointer" src="./img/element-3.svg" alt="">
                </div>
           </div>
        </div>
        <div class="flex w-full flex-wrap gap-2 justify-around">
            <p>No Reservations Found</p>
        </div>
    </section>
    </div>
</body>
</html>
