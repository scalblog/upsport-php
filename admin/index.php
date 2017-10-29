<?php
    include '../functions/main-functions.php';

    $pages = scandir('pages/');

    if(isset($_GET['page']) && !empty($_GET['page'])) {
        if (in_array($_GET['page'].'.php',$pages)) {
            $page = $_GET['page'];
        } 
        else {
            $page = "error";
        }
    }
    else {
        $page = "dashboard";
    }


    $pages_functions = scandir('functions/');

    if(in_array($page.'.func.php', $pages_functions)){
        include 'functions/'.$page.'.func.php';
    }
?>


<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/style.css"  media="screen,projection"/>
      <title>Administration du site</title>  
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <?php
        include "body/topbar.php";
      ?>
      <div class="container">
      
        <?php 
            include 'pages/'.$page.'.php';
        ?>

      </div>



      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="../js/script.js"></script>
      <?php
        $pages_js = scandir('js/');
        
            if(in_array($page.'.func.js', $pages_js)){
                ?>
                <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>
                <?php
            }
      ?>
    </body>
  </html>
        