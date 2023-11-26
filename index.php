<?php 

define('DIR_PATH' , __DIR__);
include DIR_PATH . '/inc/lib.php';
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Frank Astin - Full Stack Web Developer</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300;500;700;800&family=Montserrat:wght@300;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
  <meta name="description" content="Frank Astin - Full Stack Web Developer">


  <link rel="icon" href="/img/frankastin_2024.png" sizes="any">
  <link rel="icon" href="/icon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="frankastin_2024.png">

  <link rel="manifest" href="site.webmanifest">
  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?= getPageName(); ?>">

   <header>
        
        <div class="container">
             
            <nav>
                <a href="/Portfolio">Portfolio</a>

                <!-- <a href="">Upwork</a> -->
            </nav>
             
        </div>

   </header>


   <div class="container">
   <?php loadPage(); ?>
</div>

</body>

</html>
