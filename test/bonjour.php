<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Réception de paramètres dans l'URL</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
   <body>
   
   <p>Bonjour <?php echo htmlspecialchars($_POST['prenom']) . ' ' . htmlspecialchars($_POST['nom']); ?> !</p>
   
   <form action="cible_envoi.php" method="post" enctype="multipart/form-data">
        <p>
                Formulaire d'envoi de fichier :<br />
                <input type="file" name="monfichier" /><br />
                <input type="submit" value="Envoyer le fichier" />
        </p>
</form>

<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
                        echo "L'envoi a bien été effectué !";
                }
        }
}
?>


   </body>
</html>
