<?php require_once('header.inc.php') ?>

<div class="container-home">
    <form method="POST" action="../models/modelSignUp.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Prénom</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="" name="fname">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Nom</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="" name="lname">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">E-Mail</label>
            </div>
            <div class="small-8 columns">
              <input type="email" id="right-label" placeholder="" name="email">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Mot de passe</label>
            </div>
            <div class="small-8 columns">
              <input type="password" id="right-label" name="pwd">
            </div>
            <div class="row">
           <div class="small-4 columns">
              <label for="right-label" class="right inline">Statut</label>
            </div>
            <div class="small-8 columns">
              <input type="right-label" id="right-label" name="stt">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Centre</label>
            </div>
            <div class="small-8 columns">
              <input type="right-label" id="right-label" name="cen">
            </div>
          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Valider" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Retour" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>
</div>


<?php require_once('footer.inc.php') ?>