<?php

class model
{
    protected $pdo = null;
    protected $dernierId = 0;
    protected $message = "";

    // DB CONNEXION
    protected function getBdd()
    {
        if($this->pdo == null)
        {
            try
            {
                $this->pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            }
            catch (PDOException $e)
            {
                print "Erreur : " . $e->getMessage() . "<br />";
                exit();
            }

        }
        return $this->pdo;
    }

    // REQUEST EXECUTION
    protected function executerRequete($requete, $parametres = null)
    {

        // WITHOUT PARAMETERS
        if ($parametres == null)
        {
            $resultat = $this->getBdd()->query($requete);
        }

        // WITH PARAMETERS
        else
        {
            $resultat = $this->getBdd()->prepare($requete);
            $resultat->execute($parametres);
        }

        return $resultat;
    }
}
