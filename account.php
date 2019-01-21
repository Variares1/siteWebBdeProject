<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Login invalide</h1>';
  header("Refresh: 3; url=index.php");
}

if($_SESSION["Statut"]==="admin") {
  header("location:admin.php");
}

include 'config.php';

?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mon Compte || E-Commerce</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">E-Commerce</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
       <ul class="right">
          <li><a href="about.php">A Propos</a></li>
          <li><a href="products.php">Produits</a></li>
          <li><a href="cart.php">Panier</a></li>
          <li><a href="orders.php">Mes Commandes</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li class="active"><a href="account.php">Mon Compte</a></li>';
            echo '<li><a href="logout.php">Quitter</a></li>';
          }
          else{
            echo '<li><a href="login.php">Se Connecter</a></li>';
            echo '<li><a href="register.php">Inscription</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p><?php echo '<h3>Bonjour ' .$_SESSION['fname'] .'</h3>'; ?></p>

        <p><h4>Détails de mon Compte</h4></p>

        <p>Pour modifier votre compte il suffit de modifier le champs à changer</p>
      </div>
    </div>


    <form method="POST" action="update.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-12">

          <div class="row">
            <div class="small-3 columns">
              <label for="right-label" class="right inline">Prénom</label>
            </div>
            <div class="small-8 columns end">
              <?php

                $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

                if($result === FALSE){
                  die(mysql_error());
                }

                if($result) {
                  $obj = $result->fetch_object();
                  echo '<input type="text" id="right-label" placeholder="'. $obj->fname. '" name="fname">';

                  echo '</div>';
                    echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Nom</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label" placeholder="'. $obj->lname. '" name="lname">';

                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">email</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->email. '" name="email">';



                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Statut</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->Statut. '" name="Statut">';
                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Centre</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label" placeholder="'. $obj->Centre. '" name="Centre">';

                  echo '</div>';
                  echo '</div>';
              }

              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Mot de Passe</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="password" id="right-label" name="pwd">';

              echo '</div>';
              echo '</div>';
          ?>

          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Update" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>



    <div class="row" style="margin-top:30px;">
      <div class="small-12">

         <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; E-Commerce. Tout droits réservé.</p>
        </footer>

      </div>
    </div>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
