<?php require_once('header.inc.php') ?>

<div class="container-home">
    <form method="POST" action="../models/modelSignUp.php" style="margin-top:30px;">
              <label for="right-label" class="right inline">Prénom</label>
              <input type="text" id="right-label" placeholder="" name="fname">
              <label for="right-label" class="right inline">Nom</label>
              <input type="text" id="right-label" placeholder="" name="lname">
              <label for="right-label" class="right inline">E-Mail</label>
              <input type="email" id="right-label" placeholder="" name="email">
              <label for="right-label" class="right inline">Mot de passe</label>
              <input type="password" id="right-label" name="pwd">
              <label for="right-label" class="right inline">Statut</label>
              <input type="right-label" id="right-label" name="stt">
              <label for="right-label" class="right inline">Centre</label>
              <input type="right-label" id="right-label" name="cen">

              <input type="submit" id="right-label" value="Valider" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Retour" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
    </form>
</div>

<?php require_once('footer.inc.php') ?>