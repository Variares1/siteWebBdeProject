<?php require_once('header.inc.php') ?>


<?php
//echo $donnees[0]->$donnee["title"];
foreach ($donnees as $donnee) {
    //echo $donnee["title"];
}?>

<div class="container-home">
    <div class="bde">
        <h1>BDE <br><p>Events, activities, projects and more !</p></h1>
    </div>
    <div class="events-home">
        <a href="./views/viewShop.html.php"><img src="https://leekwars.com/image/about/illustration.png" alt=""></a>
        <div class="events-home-text"><h2>Events</h2><strong style="color: green">Leek Wars</strong> est un jeu de combat de poireaux, par navigateur, dans lequel vous programmez votre intelligence artificielle pour réussir à vaincre vos ennemis !</div>
    </div>
    <div class="ideas-home">
        <div class="activities-home-text"><h2><i class="far fa-calendar-check"></i> Activities</h2><strong style="color: rgba(255, 165, 0, 0.8);">...</strong></div>
        <div class="idea-home-text"><h2><i class="fas fa-box-open"></i> Idea Box <i class="far fa-lightbulb"></i></h2><strong style="color: #6586b9cc">...</strong></div>
    </div>
</div>

<?php require_once('footer.inc.php') ?>