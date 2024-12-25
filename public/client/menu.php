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
    <section class="flex flex-col w-full h-full p-4 md:p-32 items-center justify-center text-black">
        <h1 class="text-[50px] ">Our <span class='text-primary font-bold'>Menu</span></h1>
    
        <div class="flex flex-wrap h-[100%] w-[100%] justify-around gap-8 pt-8">
           <?php
            foreach($allMenu as $menu){
                $allPlat = $con->query("SELECT * from plat inner join menu_plat on menu_plat.id_plat = plat.id inner join menu on menu_plat.id_menu = menu.id where menu.id = ".$menu['id']."");
                echo " <div class='p-2 flex flex-col gap-2  w-[40%] h-full'>
                <div>
                    <div class='flex justify-center  '>
                        <p
                            class='border-t-2 border-r-2 border-l-2 px-2 flex text-center py-1 hover:border-primary hover:border-t-2 hover:border-r-2 hover:border-l-2'>
                            ".$menu['titre']." : ".$menu['prix']."$</p>
                    </div>
                    <div
                        class='border-t-2 flex flex-col border-b-2 hover:border-primary hover:border-t-2 hover:border-b-2 font-secondary '>
                        ";
                        foreach($allPlat as $plat)
                        {
                            $query = "SELECT * FROM image WHERE id = " . $plat['id_image'];
                            $result2 = $con->query($query);
                        
                            if ($result2 && $result2->num_rows > 0) {
                                $imageData = $result2->fetch_assoc();
                                $image = $imageData['data']; 
                                $imageType = $imageData['type']; 
                        
                               
                                $base64Image = base64_encode($image);
                                $imageSrc = "data:$imageType;base64,$base64Image";
                            } 
                        
                        echo "
                        <div class='flex flex-col py-2 md:flex-row'>
                            <div class='w-[100%] md:w-[70%] flex flex-col items-center h-full '>
                                <p><span class='text-gray-500 font-primary'>Plat:</span> {$plat['titre_plat']}</p>
                                <h3><span class='text-gray-500 font-primary'>Categorie:&nbsp;</span>{$plat['categorie']}</h3>
                            </div>
                            <div class='w-[100%] md:w-[30%]'>
                                <img class='h-20 w-full' src='$imageSrc' alt='Dish image'>
                            </div>
                        </div>";
                    }
                        echo "

                    </div>
                </div>
            </div>";
            }
           ?>

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