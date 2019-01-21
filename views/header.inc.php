<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/script.js"></script>

    <?php define('page', $_SERVER['PHP_SELF'], true) ?>

</head>
<body>
<div class="header">
    <?php

    $index = "./index.php";
    $project = "./project.php";
    $shop = "./shop.php";
    $form = "./form.php";
    $php = "./php.php";
    $signUp = "./signUp.php";
    $signIn = "./signIn.php";

    ?>

    <nav>
        <?php if(page == "/www/index.php") echo "<div class='here'>" ?>
        <li><a href=<?php echo $index ?>>home</a></li>
        <?php if(page == "/www/index.php") echo "</div>" ?>
        <?php if(page == "/www/project.php") echo "<div class='here'>" ?>
        <li><a href=<?php echo $project ?>>Project</a></li>
        <?php if(page == "/www/project.php") echo "</div>" ?>
        <?php if(page == "/www/shop.php") echo "<div class='here'>" ?>
        <li><a href=<?php echo $shop ?>>shop</a></li>
        <?php if(page == "/www/shop.php") echo "</div>" ?>
        <?php if(page == "/www/signIn.php") echo "<div class='here'>" ?>
        <li><a href=<?php echo $signIn ?>>Sign in</a></li>
        <?php if(page == "/www/signIn.php") echo "</div>" ?>
        <?php if(page == "/www/signUp.php") echo "<div class='here'>" ?>
        <li><a href=<?php echo $signUp ?>>Sign up</a></li>
        <?php if(page == "/www/signUp.php") echo "</div>" ?>
    </nav>

    <leftMenu>
        <div class="cesiLogo" >
            <a href=<?php echo $index ?>>
                <img src="https://images-ext-1.discordapp.net/external/Q6EGjALRzRlMZVIeP_6Jd7X6x3RyvYKqyhJ2FKLLyl4/https/cdn.discordapp.com/attachments/385099252226981889/535765385241296899/Logo.jpg" alt="CESI">
            </a>
        </div>
    </leftMenu>

</div>

</body>
</html>
