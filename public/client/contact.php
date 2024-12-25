<?php
session_start();
include '../../backend/database/database.php';
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
<header class="bg-[url('../image/bg22.png')] bg-cover h-[40%] bg-no-repeat object-fit  " >
        <nav class="w-full h-[40%] sticky  flex overflow-hidden items-center justify-around">
            <div class="h-full flex items-center h-full ">
                <img class="w-28 h-16 " src="../image/logo2.png" alt="">
            </div>
      
                <ul class="flex w-[30%] justify-around text-lg font-bold tracking-widest">
                    <li ><a class="nav-items hover:text-[#9c7e54] hover:font-bold" href="home.php">Home</a></li>
                    <li><a class="nav-items hover:text-[#9c7e54] hover:font-bold "  href="menu.php">Menu</a></li>
                    <li><a class="nav-items hover:text-[#9c7e54] hover:font-bold"  href="contact.php">Contact</a></li>
                    <?php
                        if(isset($_SESSION['id_logged'])){
                        echo "<li><a href='reservation.php'>My Reservations</a></li>";
                    }
                    ?>
                </ul>
     
            <div>
            <?php
                if(isset($_SESSION['id_logged']))
                {
                   echo' <button class="px-4 py-2 bg-primary rounded-xl hover:bg-transparent hover:border hover:text-primary"><a href="../../backend/actionsPHP/logout.php">Logout</a></button>';

                }
                else 
                {
                    echo '<button class="px-4 py-2 bg-primary rounded-xl hover:bg-transparent hover:border hover:text-primary"><a href="../index.php">Login/Signup</a></button>';
                }
            ?>            </div>
        </nav>
        <div class="h-72 w-[100%] flex p-8 items-center justify-center ">
                <p class="text-[50px]">Contact</p>
        </div>

    </header>
    <section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="hidden">Contact</h2>
        <div class="flex flex-wrap -mx-4">
          
            <div class="w-full lg:w-1/2 px-4 mb-6 lg:mb-0">
                <div class="relative h-96 rounded-lg overflow-hidden shadow-lg">
                    <iframe 
                        class="w-full h-full" 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29749.225774882685!2d72.84343101893258!3d21.245595574425934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f4fb5c0b087%3A0xb7aabd8a90da0679!2sMota%20Varachha%2C%20Surat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1690017805909!5m2!1sen!2sin"
                        allowfullscreen="" 
                        loading="lazy"
                    ></iframe>
                </div>
            </div>

            
            <div class="w-full lg:w-1/2 px-4">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <form action="contact.html#">
                        <div class="space-y-6">
                         
                            <div>
                                <label for="firstname" class="block text-sm font-medium text-gray-700">Your Name*</label>
                                <input 
                                    type="text" 
                                    id="firstname" 
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary"
                                    required
                                >
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Your Email*</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary"
                                    required
                                >
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700">Your Subject*</label>
                                <input 
                                    type="text" 
                                    id="subject" 
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary"
                                    required
                                >
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Message*</label>
                                <textarea 
                                    id="message" 
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary"
                                    rows="5"
                                    required
                                ></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button 
                                    type="button" 
                                    class="bg-[#9c7e54] text-white py-2 px-6 rounded-md shadow-md hover:bg-[#826642] transition duration-300"
                                >
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php') ?>
</body>
</html>