<?php
include('model.php');

class modelHome extends model
{
    // SHOW PAGE
    function afficherInformations()
    {
        $requete = "SELECT * FROM p_home ";
        $resultat = $this->executerRequete($requete);

        $donnees = $resultat->fetch(PDO::FETCH_OBJ);

        return $donnees;
    }

    // SHOW SLIDER
    function afficherSlider()
    {
        $requete = "SELECT * FROM p_slider ";
        $resultat = $this->executerRequete($requete);

        $donnees = $resultat->fetchAll();

        return $donnees;
    }

    // SHOW EVENTS
    function afficherEvents()
    {
        $requete = "SELECT * FROM events ";
        $resultat = $this->executerRequete($requete);

        $donnees = $resultat->fetchAll();

        return $donnees;
    }
}

