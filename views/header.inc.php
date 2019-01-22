<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
    $signUp = "http://localhost/siteWebBdeProject/views/viewSignUp.html.php";
    $signIn = "http://localhost/siteWebBdeProject/views/viewSignIn.html.php";

    ?>

    <nav>
        <li><a href=<?php echo $index ?>><i class="fas fa-home"></i> home</a></li>
        <li><a href=<?php echo $ideas ?>><i class="far fa-lightbulb"></i> ideas</a></li>
        <li><a href=<?php echo $events ?>><i class="far fa-calendar-alt"></i> events</a></li>
        <li><a href=<?php echo $shop ?>><i class="fas fa-shopping-basket"></i> shop</a></li>
        <li class="sign-home"><a href=<?php echo $signIn ?>><i class="fas fa-user"></i> Sign in/up</a></li>
    </nav>

    <leftMenu>
        <div class="cesiLogo" >
            <a href=<?php echo $index ?>>
                <img src="https://images-ext-1.discordapp.net/external/Q6EGjALRzRlMZVIeP_6Jd7X6x3RyvYKqyhJ2FKLLyl4/https/cdn.discordapp.com/attachments/385099252226981889/535765385241296899/Logo.jpg" alt="CESI">
                <div class="shop-home">
                    <div class="bandeau-shop-home">
                        <p>3 most popular articles</p>
                    </div>
                </div>
            </a>
        </div>
    </leftMenu>

</div>

</body>
</html>
