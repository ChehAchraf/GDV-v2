
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <?php include 'header.php';
    $allMenu = $con ->query('SELECT * from menu');
    ?>

    <section class="flex flex-col md:flex-row w-full h-full p-4 md:p-32  items-center justify-center text-black">
            <div class=" flex ">
                <img class=" w-[90%] rounded-tl-3xl rounded-tr-full rounded-bl-full rounded-br-full " src="../image/bg.jpeg" alt="">
                <!-- <img class="w-[40%] rounded-tr-3xl rounded-tl-full rounded-bl-full rounded-br-full " src="../image/image.webp" alt=""> -->
                     
            </div>
            <div class="text-center">
                    <p class="text-[#757575] ">Chef Pro Hamza</p>
                  <h2 class="text-[40px] font-bold ">Welcome to <span class="text-primary font-bold">Chef</span>  PRO,
                    A <span class="text-primary font-bold">Feast</span> for the Senses</h2>
                  <p class="">
                    Immerse yourself in an unparalleled dining experience where flavors, aromas, and ambiance come together to create a feast for all your senses. Welcome to Royalx restaurant.
                    Join us at Royalx restaurant and discover a world of culinary excellence. Our chefs craft each dish with passion and precision, bringing you the finest flavors from around the globe.
                  </p>
                  <p class="font-bold">Mr. Hamza GBOURI</p>
                  <div class='flex justify-center'>
                  <img class="w-24 h-24 text-center" src="../image/signature.png" alt="">

                  </div>
            </div>
    </section>
    <section class="text-black w-full px-4 pb-4  md:px-32 md:pb-32 flex gap-4 flex-col h-full items-center justify-center">
        <div class="flex gap-2">
            <img src="../image/left-shape.svg" alt="">
            <h2> Our Menu</h2>
            <img src="../image/right-shape.svg" alt="">
        </div>
        <p class="text-[40px]">Delicious <span class="text-primary font-bold">Dishes</span></p>
        <div class="flex h-[100%] md:gap-8">
            <div class="flex flex-col gap-4 justufy-around h-auto h-[100%] w-[100%] md:w-[50%]">
                    <?php
                    $cmp = 0;
                    foreach($allMenu as $menu){
                        echo "<div class='p-2 flex flex-col gap-2 border-t-2 border-b-2 w-full hover:border-primary hover:border-t-4 hover:border-b-4'>
                        <div class='flex justify-between'>
                        <p>" .$menu['titre'] ."</p>
                        <p class='text-primary text-xl '>" .$menu['prix'] ."$</p>
                        </div>
                        ";
                        $allPlat = $con->query("SELECT * from plat inner join menu_plat on menu_plat.id_plat = plat.id inner join menu on menu_plat.id_menu = menu.id where menu.id = ".$menu['id']."");
                        $plats = [];
                        foreach ($allPlat as $plat) {
                            $plats[] = $plat['titre_plat']; // Collect the plat names in an array
                        }
                    
                        echo "<p>" . implode(", ", $plats) . "</p>"; // Join plat names with a comma and space
                    
                        echo "</div>";
                    
                        $cmp++;
                        if ($cmp == 6) {
                            break;
                        }
                    }
                    ?>
                    
                    
                    
                    
            </div>
            <div class=" hidden md:flex flex-wrap w-[90%] md:w-[60%] gap-4">
                    <img class="w-[50%] h-64 rounded-t-full rounded-bl-full" src="../image/plat.jpg" alt="">
                    <img class="w-[40%] h-64 rounded-t-full rounded-br-full" src="../image/plat.jpg" alt="">
                    <img class="w-[50%] h-64 rounded-b-full rounded-tl-full" src="../image/plat.jpg" alt="">
                    <img  class="w-[40%] h-64 rounded-b-full rounded-tr-full"src="../image/plat.jpg" alt="">
            </div>

        </div>
       

    </section>
    <section class="text-black w-full px-4 pb-4  md:px-32 md:pb-32 flex gap-4 flex-col h-full items-center justify-center">
        <div class="flex gap-2">
            <img src="../image/left-shape.svg" alt="">
            <h2> Our Best Reviews</h2>
            <img src="../image/right-shape.svg" alt="">
        </div>
        <div class="w-full flex flex-wrap md:flex-no-wrap justify-center gap-4 pt-8">
            <div class="flex flex-col w-[50%] md:w-[20%]">
                <img class="rounded-t-full" src="../image/1.jpg" alt="">
                <p class="font-bold text-center">Hamza Gbouri</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, odit nam neque excepturi, illo, nulla </p>

            </div>
            <div class="flex flex-col w-[50%] md:w-[20%]">
                <img class="rounded-t-full" src="../image/2.jpg" alt="">
                <p class="font-bold text-center">Hamza Gbouri</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, odit nam neque excepturi, illo, nulla </p>

            </div>
            <div class="flex flex-col w-[50%] md:w-[20%]">
                <img class="rounded-t-full " src="../image/3.jpg" alt="">
                <p class="font-bold text-center">Hamza Gbouri</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, odit nam neque excepturi, illo, nulla </p>

            </div>
            <div class="flex flex-col w-[50%] md:w-[20%]">
                <img class="rounded-t-full" src="../image/4.jpg" alt="">
                <p class="font-bold text-center">Hamza Gbouri</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, odit nam neque excepturi, illo, nulla </p>

            </div>

        </div>
    </section>
    <section class="text-black w-full px-4 pb-4  md:px-32 md:pb-32  flex gap-4 flex-col h-full items-center justify-center">
        <div class="flex gap-2">
            <img src="../image/left-shape.svg" alt="">
            <h2> Book Now</h2>
            <img src="../image/right-shape.svg" alt="">
        </div>
        <p class="text-[40px]">Try Our <span class="text-primary font-bold">Experience</span> now!</p>
        <button class="px-4 py-2 bg-primary rounded-xl hover:bg-transparent hover:border hover:text-primary">Book Now</button>

    </section>
    
    <?php
    include 'footer.php';
    ?>
</body>
</html>