<?php
session_start();
if(isset($_SESSION['id_logged']))
{
    header('Location: /Gestion Restaurant/frontend/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
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
<header class="bg-[url('image/bg22.png')] bg-cover h-[40%] bg-no-repeat object-fit  " >
        <nav class="w-full h-[40%] sticky  flex overflow-hidden items-center justify-around">
            <div class="h-full flex items-center h-full ">
                <img class="w-28 h-16 " src="image/logo2.png" alt="">
            </div>
      
            <ul class="md:flex justify-center w-[30%]  justify-around text-lg font-bold tracking-widest">
                    <li ><a class="nav-items hover:text-[#9c7e54] hover:font-bold" href="home.php">Home</a></li>
                    <li><a class="nav-items hover:text-[#9c7e54] hover:font-bold "  href="menu.php">Menu</a></li>
                    <li><a class="nav-items hover:text-[#9c7e54] hover:font-bold"  href="contact.php">Contact</a></li>
                    <?php
                        if(isset($_SESSION['id_logged'])){
                        echo "<li><a href='reservation.php'>My&nbsp;Reservations</a></li>";
                    }
                    ?>
                </ul>
     
            <div>
                <button class="px-4 py-2 bg-primary rounded-xl hover:bg-transparent hover:border hover:text-primary"><a href="index.php">Login/Signup</a></button>
            </div>
        </nav>
        <div class="h-72 w-[100%] flex p-8 items-center justify-center ">
                <p class="text-[50px]">SIGN UP</p>
        </div>

    </header>
    <section class="flex flex-col md:flex-row w-full h-full p-4 md:p-32 items-center justify-around text-black">
            <div class=" flex w-[90%] md:w-[40%]">
                <img class="w-[100%] rounded-tr-3xl rounded-tl-full rounded-bl-full rounded-br-full " src="image/image.webp" alt="">
                     
            </div>
            <div class="w-[90%] md:w-[40%] flex flex-col gap-8">
                    <p class="text-[#757575] text-center text-[40px] ">SIGN UP</p>
                    <form action="../backend/actionsPHP/signup.php" method="post" class="flex flex-col gap-4" >
                    <div class="flex flex-col gap-2">
                        <label for="name-signup text-xl">Name</label>
                        <input id="name-signup" name="name-signup" type="text" class='border pl-4 py-2' placeholder="Enter your name...">
                        </div>
                        <div class="flex flex-col gap-2">
                        <label for="email-signup text-xl">Email</label>
                        <input id="email-signup" type="text" name="email-signup" class='border pl-4 py-2' placeholder="Enter your email...">
                        </div>
                       
                        <div class="flex flex-col">
                            <label for="password-signup">Password</label>
                            <input id="password-signup" name="password-signup" class='border pl-4 py-2' type="password" placeholder="Enter your password...">
                        </div>
                        <button class="px-4 py-2 bg-primary rounded-xl hover:bg-transparent hover:border hover:text-primary">Sign Up</button>
                        <p class="text-[#757575] text-center">Already have an account? <a class="underline" href="index.php">login</a> </p>

                    </form>
                
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Obtenez les éléments du formulaire
    const form = document.querySelector("form");
    const nameInput = document.getElementById("name-signup");
    const emailInput = document.getElementById("email-signup");
    const passwordInput = document.getElementById("password-signup");

    // Écoutez l'événement de soumission du formulaire
    form.addEventListener("submit", function (event) {
        let isValid = true;

        // Validation du champ "Name"
        const nameRegex = /^[a-zA-Z\s]{3,}$/;
        if (!nameRegex.test(nameInput.value)) {
            Swal.fire({
                icon: "error",
                title: "Nom invalide",
                text: "Le nom doit contenir au moins 3 caractères alphabétiques.",
            });
            isValid = false;
        }

        // Validation du champ "Email"
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (isValid && !emailRegex.test(emailInput.value)) {
            Swal.fire({
                icon: "error",
                title: "Email invalide",
                text: "Veuillez entrer une adresse email valide.",
            });
            isValid = false;
        }

        // Validation du champ "Password"
        const passwordRegex = /^[A-Za-z\d@$!%*?&]{8,}$/;
        if (isValid && !passwordRegex.test(passwordInput.value)) {
            Swal.fire({
                icon: "error",
                title: "Mot de passe invalide",
                html: "Le mot de passe doit contenir :<ul style='text-align:left;'><li>Au moins 8 caractères</li><li>Une majuscule</li><li>Une minuscule</li><li>Un chiffre</li><li>Un caractère spécial</li></ul>",
            });
            isValid = false;
        }

        // Empêcher l'envoi si une validation échoue
        if (!isValid) {
            event.preventDefault();
        }
    });
</script>


    <footer>
        <div class="bg-black text-gray-200 py-10 text-sm px-32">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                    <!-- Social Media Section -->
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <img src="image/logo2.png" alt="logo" class="w-16 h-auto">
                        </div>
                        <p class="text-sm leading-relaxed">
                            Our hotel seamlessly blends timeless charm with modern amenities, offering an unparalleled experience for travelers.
                        </p>
                        <div class="flex space-x-4">
                            <a href="javascript:void(0)" class="block">
                                <img src="client/assets/img/logo/logo-footer-1.png" alt="logo-footer-1" class="w-24 h-auto">
                            </a>
                            <a href="javascript:void(0)" class="block">
                                <img src="client/assets/img/logo/logo-footer-2.png" alt="logo-footer-2" class="w-24 h-auto">
                            </a>
                        </div>
                    </div>

                    <!-- Explore Section -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Explore</h4>
                        <ul class="space-y-2">
                            <li><a href="restaurant.html" class="hover:underline">Restaurant</a></li>
                            <li><a href="spa.html" class="hover:underline">Spa & Beauty</a></li>
                            <li><a href="javascript:void(0)" class="hover:underline">Gym & Fitness</a></li>
                            <li><a href="rooms.html" class="hover:underline">Rooms & Suites</a></li>
                            <li><a href="javascript:void(0)" class="hover:underline">Book Now</a></li>
                            <li><a href="javascript:void(0)" class="hover:underline">Events</a></li>
                        </ul>
                    </div>

                    <!-- City Branches Section -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4">City Branches</h4>
                        <ul class="space-y-2">
                            <li><a href="javascript:void(0)" class="hover:underline">Bharat</a></li>
                            <li><a href="javascript:void(0)" class="hover:underline">Mexico</a></li>
                            <li><a href="javascript:void(0)" class="hover:underline">Venezuela</a></li>
                            <li><a href="javascript:void(0)" class="hover:underline">Germany</a></li>
                            <li><a href="javascript:void(0)" class="hover:underline">Australia</a></li>
                            <li><a href="javascript:void(0)" class="hover:underline">California</a></li>
                        </ul>
                    </div>

                    <!-- Contact Section -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Contact</h4>
                        <ul class="space-y-2">
                            <li><a href="" class="hover:underline">About Us</a></li>
                            <li><a href="" class="hover:underline">Contact Us</a></li>
                     
                            <li><a href="" class="hover:underline">FAQ</a></li>
                            <li><a href="javascript:void(0)" class="hover:underline">Privacy Policy</a></li>
                            <li><a href="javascript:void(0)" class="hover:underline">Terms & Conditions</a></li>
                        </ul>
                    </div>

                    <!-- Other Info Section -->
                    <div class="space-y-4">
                        <div>
                            <h5 class="font-semibold">Address</h5>
                            <p class="text-sm">987-A, Dudhivadar, Rajkot, Gujarat, Bharat - 360410.</p>
                        </div>
                        <div>
                            <h5 class="font-semibold">Email</h5>
                            <a href="mailto:example@rx-email.com" class="text-sm hover:underline">example@rx-email.com</a>
                        </div>
                        <div>
                            <h5 class="font-semibold">Phone No</h5>
                            <a href="tel:+911234567890" class="text-sm hover:underline">+91(1234)(567)(890)</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class=" text-gray-400 pb-4 pt-8 ">
                <div class="container mx-auto px-4 w-full flex flex-col sm:flex-row justify-around items-center">
                    <p class="text-sm text-center">&copy; 2024 <a href="" class="hover:underline text-white">Chef Pro</a>, All Rights Reserved.</p>
                    
                </div>
            </div>
        </div>
    </footer>
</body>
</html>