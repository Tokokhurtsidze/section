<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <?php
        include("data.php");
        include("functions.php");
       
    ?>

    


    <!-- header  -->

<header>
    <div class="header container">
        <div class="logo">
           <?php
             a('Animals','./index.php')
            ?>
        </div>

        <div class="nav">
            <?php 
                foreach($headerNav as $nav){
                    a($nav['nav'],$nav['link']);
                };
            ?>
        </div>
    </div>
</header>





<!-- home section  -->

<form action="./index.php" method="get" class="search">
    <input type="text" placeholder="Search" name="search">
    <button type="submit">
        <i class='bx bx-search-alt'></i>
    </button>

</form>



<!-- cards section -->
<section>
    <div class="cards container">
        <?php 
      if ($_SERVER['REQUEST_METHOD'] === "GET") {
        $search = $_GET['search'] ?? ''; 
    
  
        if (empty($search)) {
            foreach ($animals as $animal) {
                
                $backgroundColor = $animal['danger'] ? 'brown' : 'black';
                echo '<div class="card" style="background-color: ' . $backgroundColor . ';">';
                img($animal['image']);
                h1($animal['name']);
                p($animal['desc']);
                h2($animal['price']);
                echo "</div>";
            }
        } else {
            $found = false; 
            foreach ($animals as $animal) {
                if (strtolower($search) == strtolower($animal['name'])) { 
                    $backgroundColor = $animal['danger'] ? 'brown' : 'black';
                    echo '<div class="card" style="background-color: ' . $backgroundColor . ';">';
                    img($animal['image']);
                    h1($animal['name']);
                    p($animal['desc']);
                    h2($animal['price']);
                    echo "</div>";
                    $found = true; 
                }
            };
    
            if (!$found) {
                echo "<p class ='noSearch'>No animal found with the name '{$search}'.</p>";
            }
        }
    }
         ?>

   
    </div>
</section>






<!-- footer  -->

<footer>
    <div class="footer container">
        <div class="logo">
            <a href="./index.html">Animals</a>
        </div>

        <div class="footer-nav">
            <a href="#">+995 555 555 555</a>
            <a href="#">Animals@gmail.com</a>
            <a href="#">Afrika</a>
        </div>
    </div>
</footer>

</body>
</html>