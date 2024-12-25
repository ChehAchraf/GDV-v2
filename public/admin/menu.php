<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <aside class="w-[16rem] border-r min-h-full flex flex-col items-center gap-16">
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
            <header class=" h-20 border-b">
                <nav class=" h-full flex justify-between mx-8 items-center">
                    <div class="flex gap-2">
                        <img src="./img/Search.svg" alt="">
                        <input class="search outline-none border-none w-64 px-4 py-2 rounded-2xl" type="search" name="search-input" id="search-input" placeholder="Search anything here">
                    </div>
                    <div class="flex w-72 justify-between items-center">
                        <img class="cursor-pointer" src="./img/settings.svg" alt="">
                        <img class="cursor-pointer" src="./img/Icon.svg" alt="">
                        <form action="../../backend/actionsPHP/logout.php" action="post">
                            <button><img src="img/logout.png" class="h-4 w-4" alt=""></button>
                        </form>
                        <div class="flex items-center gap-2 cursor-pointer">
                            <div class=" cursor-pointer w-10 h-10 bg-[url('img/Ana.jpg')] bg-cover rounded-full text-white relative ">
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
                        Menu
                    </h1>
                    <div class="flex gap-4">
                        <button class="flex gap-2 items-center border px-4 py-2 rounded-lg text-[#0E2354] ">
                            <img src="./img/Downlaod.svg" alt="">Export
                        </button>
                        <button id="add-etd" onclick="document.getElementById('modal').style.display='flex'" class="flex gap-2 items-center bg-primary px-4 py-2 rounded-lg text-white ">
                            <img src="./img/_Avatar add button.svg" alt="">New Menu
                        </button>
                    </div>
                </div>

                <div class="flex justify-between items-center px-4 border py-4 rounded-lg">
                    <div class="flex gap-2">
                        <img src="./img/Search.svg" alt="">
                        <input class="search outline-none border-none w-72 px-4 py-2 rounded-2xl" type="search" name="search-input" id="search-input" placeholder="Search menu by name...">
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
                <div class="grid grid-cols-2 gap-2 justify-around">
                    <div class='w-[90%] border h-auto flex flex-col gap-2 rounded-lg p-2'>
                        <div class='flex justify-between'>
                            <p class='text-center'>Menu Title</p>
                            <div class='flex gap-2'>
                                <img class='w-4 h-4' src='img/editinggh.png' alt='edit'>
                                <img class='w-4 h-4' src='img/delete.png' alt='delete'>
                            </div>
                        </div>
                        <div class='flex border p-1'>
                            <div class='w-[70%]'>
                                <p><span class='text-gray-500'>Plat:</span> Plat Title</p>
                                <h3><span class='text-gray-500'>Categorie: </span>Category</h3>
                                <p>Ingredients: ingredient1, ingredient2, ingredient3</p>
                            </div>
                            <div class='w-[30%]'>
                                <img class='h-20 w-full' src="data:image/jpeg;base64,..." alt='Dish image'>
                            </div>
                        </div>
                        <p class='text-center'><span class='text-gray-500'>Menu Price: </span>Price $</p>
                    </div>
                </div>
            </section>
        </div>
        <div id='modal' class='modal bg-black bg-opacity-75 hidden items-center justify-center fixed inset-0 z-50'>
            <div class="w-full m-8 h-[90%] border border-2 border-black overflow-auto rounded-3xl bg-white relative z-50 md:w-2/4">
                <svg class="fill-primary absolute cursor-pointer top-0 right-0 pr-4 pt-2 w-10 h-8 " onclick="closeModal()" xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" viewBox="0 0 24 24">
                    <path d="M20.48 3.512a11.97 11.97 0 0 0-8.486-3.514C5.366-.002-.007 5.371-.007 11.999c0 3.314 1.344 6.315 3.516 8.487A11.97 11.97 0 0 0 11.995 24c6.628 0 12.001-5.373 12.001-12.001c0-3.314-1.344-6.315-3.516-8.487m-1.542 15.427a9.8 9.8 0 0 1-6.943 2.876c-5.423 0-9.819-4.396-9.819-9.819a9.8 9.8 0 0 1 2.876-6.943a9.8 9.8 0 0 1 6.942-2.876c5.422 0 9.818 4.396 9.818 9.818a9.8 9.8 0 0 1-2.876 6.942z" />
                    <path fill="#5051fa" d="m13.537 12l3.855-3.855a1.091 1.091 0 0 0-1.542-1.541l.001-.001l-3.855 3.855l-3.855-3.855a1.092 1.092 0 0 0-1.541 1.541l3.855 3.855l-3.855 3.855a1.092 1.092 0 0 0 1.541 1.541l3.855-3.855l3.855 3.855a1.092 1.092 0 0 0 1.542-1.541z" />
                </svg>
                <form class="mt-8 mb-4 mx-6">
                    <label for="menu" class="block font-bold">Menu Title</label>
                    <input class="w-full border bg-gray-100 px-4 py-2 rounded-xl" id="menu-title" name="menu-title" type="text" required>

                    <div id="plat-container">
                        <div class="mt-4" id="plat">
                            <label for="plat" class="block font-bold">Plat Title</label>
                            <input class="w-full border bg-gray-100 px-4 py-2 rounded-xl" name="plat[]" type="text">
                            <label for="category" class="block font-bold mt-4">Category</label>
                            <input class="w-full border bg-gray-100 px-4 py-2 rounded-xl" name="category[]" type="text">
                            <label for="ingredients" class="block font-bold mt-4">Ingredients</label>
                            <input class="w-full border bg-gray-100 px-4 py-2 rounded-xl" name="ingredients[]" type="text">
                            <label for="price" class="block font-bold mt-4">Price</label>
                            <input class="w-full border bg-gray-100 px-4 py-2 rounded-xl" name="price[]" type="number">
                        </div>
                    </div>
                    <button type="button" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-xl" id="addPlatButton">Add Another Plat</button>
                    <button type="submit" class="mt-8 px-4 py-2 bg-primary text-white rounded-xl">Save Menu</button>
                </form>
            </div>
        </div>

        <script>
            function closeModal() {
                document.getElementById('modal').style.display = 'none';
            }

            document.getElementById('addPlatButton').addEventListener('click', function () {
                let platContainer = document.getElementById('plat-container');
                let newPlat = document.createElement('div');
                newPlat.innerHTML = `
                    <div class="mt-4">
                        <label for="plat" class="block font-bold">Plat Title</label>
                        <input class="w-full border bg-gray-100 px-4 py-2 rounded-xl" name="plat[]" type="text">
                        <label for="category" class="block font-bold mt-4">Category</label>
                        <input class="w-full border bg-gray-100 px-4 py-2 rounded-xl" name="category[]" type="text">
                        <label for="ingredients" class="block font-bold mt-4">Ingredients</label>
                        <input class="w-full border bg-gray-100 px-4 py-2 rounded-xl" name="ingredients[]" type="text">
                        <label for="price" class="block font-bold mt-4">Price</label>
                        <input class="w-full border bg-gray-100 px-4 py-2 rounded-xl" name="price[]" type="number">
                    </div>
                `;
                platContainer.appendChild(newPlat);
            });
        </script>
</body>

</html>
