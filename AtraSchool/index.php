<?php
    include 'functions/main-functions.php';
    include 'functions/forum-fonction.php';
    $pages = scandir('pages/');

    if(isset($_GET['page']) && !empty($_GET['page']) && in_array($_GET['page'].'.php',$pages)){
        $page = $_GET['page'];
    }else{
        $page = 'home';
    }
    $pages_functions = scandir('functions/');

    if(in_array($page.'.func.php',$pages_functions)){
        include 'functions/'.$page.'.func.php';
    }
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>AtraSchool</title>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/mobile.css"/>
        <link href="https://fonts.googleapis.com/css?family=Asap:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="css/packsenschool1.css"/> 
       <script type="text/javascript" src="js/mobile.js"></script>
       <link rel="icon" href="images/LogoforIcon.png"/>
    </head>
    <body>
            <?php
                include 'pages/'.$page.'.php';
            ?>
        
    </body>
</html> 