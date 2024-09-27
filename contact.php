<?php 
include("data.php");
include ("functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css?v=1.0">
    <title>Document</title>
</head>
<body>
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

<section class="dif-one container">
    <form action="./contact.php" method="get" class="mm">
        <input type="text" name="animal-name" placeholder="Animal name"  >
        <input type="text" name="location" placeholder="location" >
        <textarea name="Description" placeholder="Description"></textarea>
        
        <input type="submit">
        
        
    </form>

    



<?php
   
   if ($_SERVER['REQUEST_METHOD'] === "GET") {
     $name = $_GET['animal-name'] ?? ''; 
    
     $location = $_GET['location'] ?? '';
     $description = $_GET['Description'] ?? '';
     $buy=false; 
     if ($buy = !empty($name) &&  !empty($location) && !empty($description)){
       $buy=true;
     }else{
        $buy=false;
     }

 if(!$buy){
    echo '<div class="empty">';
    
    echo '</div>';
    
 }else {

    echo '<div class="blank">';
    foreach($animals as $animal){
        if($animal['name']==$name){
           img($animal['image']);
           h2('Price:   '.$animal['price']);
           if ($animal['danger']){
            p('is dangerous');

           }else{
            p('is not');
           }

           break;
        }
    };
   
    
    h2($location);
    p($description);
    
    echo '</div>';
 }
   
}


?>
</section>

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