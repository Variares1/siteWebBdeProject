<?php
    session_start();
    include('Curl.php');

    if (isset($_SESSION["session"]))
        $role = $_SESSION["session"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/siteWebBdeProject/assets/css/style.css">

</head>
<body>
<div class="header">
    <?php

    $index = "http://localhost/siteWebBdeProject/";
    $ideas = "http://localhost/siteWebBdeProject/views/viewIdeas.html.php";
    $events = "http://localhost/siteWebBdeProject/views/viewEvents.html.php";
    $shop = "http://localhost/siteWebBdeProject/views/viewShop.html.php";
    $sign = "http://localhost/siteWebBdeProject/views/viewSign.html.php";

    $page = $_SERVER['PHP_SELF'];

    $pageHome = 'index';
    $pageIdeas = 'Ideas';
    $pageEvents = 'Events';
    $pageShop = 'Shop';
    $pageSign = 'Sign';

    $here = "style='color:rgba(255, 165, 0, 0.8)'";

//    $curl = new Curl;
//    $try = $curl->get('shop');
//
//    var_dump($try);

    $data[0] = 'https://pngimage.net/wp-content/uploads/2018/06/item-png-7.png';
    $data[1] = 'https://vignette.wikia.nocookie.net/thesimssocial/images/e/ec/Hourglass_%28item%29.png/revision/latest?cb=20120802004156';
    $data[2] = 'https://vignette.wikia.nocookie.net/thesimssocial/images/2/21/Ruby-%28item%29.png/revision/latest?cb=20121108015014';

    $article1 = $data[0];
    $article2 = $data[1];
    $article3 = $data[2];

//    echo '<script>alert("Connected like '.$role.' ")</script>';

    $userColor = "";
    if (isset($_SESSION["session"])){
        $signTitle = "Account";
        if ($role == 1)
            $userColor = "style='color:rgba(165, 0, 255, 0.8)'";

        elseif ($role == 2){
            $sign = 'http://localhost/siteWebBdeProject/admin/indexA.html.php';
            $userColor = "style='color:rgba(0, 165, 255, 0.8)'";
        }

        elseif ($role == 3){
            $sign = 'http://localhost/siteWebBdeProject/admin/indexA.html.php';
            $userColor = "style='color:rgba(255, 0, 165, 0.8)'";
        }
    }
    else
        $signTitle = "Sign in/up";

    ?>

    <nav>
        <li><a href=<?php echo $index ?>><i class="fas fa-home" <?php if( strstr($page, $pageHome)) echo $here ?> ></i> home</a></li>
        <li><a href=<?php echo $ideas ?>><i class="far fa-lightbulb" <?php if( strstr($page, $pageIdeas)) echo $here ?> ></i> ideas</a></li>
        <li><a href=<?php echo $events ?>><i class="far fa-calendar-alt" <?php if( strstr($page, $pageEvents)) echo $here ?> ></i> events</a></li>
        <li><a href=<?php echo $shop ?>><i class="fas fa-shopping-basket" <?php if( strstr($page, $pageShop)) echo $here ?> ></i> shop</a></li>
        <li class="sign-home"><a href=<?php echo $sign ?>><i class="fas fa-user" <?php echo $userColor; if( strstr($page, $pageSign)) echo $here ?> ></i> <?php echo $signTitle ?></a></li>
    </nav>

    <leftMenu>
        <div class="cesiLogo" >
            <a href=<?php echo $index ?>>
                <img src="https://images-ext-1.discordapp.net/external/Q6EGjALRzRlMZVIeP_6Jd7X6x3RyvYKqyhJ2FKLLyl4/https/cdn.discordapp.com/attachments/385099252226981889/535765385241296899/Logo.jpg" alt="CESI">
                <div class="shop-home">
                    <div class="bandeau-shop-home">
                        <p>3 most popular articles</p>
                        <div class="slider">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="<?php echo $article1 ?>" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?php echo $article2 ?>" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?php echo $article3 ?>" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </leftMenu>

</div>

</body>
</html>
