<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<footer class="footer">

    <div id="footer-sep"></div>
    <div id="footer-content">
        <span class="footer-phone">Phone +33 (0)4 42 42 42 42</span>

        <?php

        $index = "http://localhost/siteWebBdeProject/";
        $ideas = "http://localhost/siteWebBdeProject/views/viewIdeas.html.php";
        $events = "http://localhost/siteWebBdeProject/views/viewEvents.html.php";
        $shop = "http://localhost/siteWebBdeProject/views/viewShop.html.php";

        ?>

        <div class="col1">
            <a href=<?php echo $index ?>>home</a><br>
            <a href=<?php echo $ideas ?>>ideas</a><br>
            <a href=<?php echo $events ?>>events</a><br>
            <a href=<?php echo $shop ?>>shop</a><br>
        </div>
        <div class="col2">
            Stay connected
            <br>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-discord"></i></a>
        </div>
    </div>
</footer>

</body>
</html>