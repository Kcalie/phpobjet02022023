<?php
require('db-inc.php');
class Random
{
    public $groupe;
    // on créer le constructeur en initialisant les personnes du groupe
    public function __construct()
    {
        $this->groupe = ['Joseph', 'Kevin', 'Philemon', 'Fransisco', 'Maxime', 'Geoffrey', 'Angeline', 'Emilie', 'Amelie', 'Jessica', 'Gerald'];
    }

    // Setter pour ajouter des personnes
    public function setPersonne($nom)
    {
        $this->groupe[] = $nom;
    }
    // Unsetter pour supprimer des personnes
    public function unsetPersonne($nom)
    {
        $key = array_search($nom,$this->groupe);
        unset($this->groupe[$key]);
        $this->groupe = array_merge($this->groupe);
        //var_dump($this->groupe);
    }

    // on va créer les groupes de travail 
    public function setGroupe()
    {
        // on insere notre objet PDO
        global $db;
        // recup le nbre de personnes dans le groupe
        $nb_personne = count($this->groupe);
        // on initialize ne numero de groupe
        $num_groupe = 1;
        // si le nbre de personnes est impair
        if($nb_personne%2 == 1)
        {
            // on selectionne 3 personnes dans le groupe
            $groupe1 = array();
            // on initialize notre tableau a 0 (reservé aux experts)
            $groupe1[] = $this->groupe[0];
            unset($this->groupe[0]);
            // on fait une requete d'insertion
            $req1 = $db->prepare('INSERT INTO `random` SET random_groupe = :num_groupe, random_prenom = :prenom, random_date = CURDATE()');
            $req1->bindValue(':num_groupe',$num_groupe,PDO::PARAM_INT);
            $req1->bindValue(':prenom',$groupe1[0],PDO::PARAM_STR);
            $req1->execute();
            for($i=0;$i<2;$i++)
            {
                // on tire une clé au sort 
                $rand = array_rand($this->groupe);
                // on va chercher l'elment du tableau
                $groupe1[] = $this->groupe[$rand];
                $req = $db->prepare('INSERT INTO `random` SET random_groupe = 1, random_prenom = :prenom, random_date = CURDATE()');
                $req1->bindValue(':num_groupe',$num_groupe,PDO::PARAM_INT);
                $req1->bindValue(':prenom',$this->groupe[$rand],PDO::PARAM_STR);
                $req1->execute();
                // on sort l'element selectionné du tableau
                unset($this->groupe[$rand]);
                //var_dump($this->groupe);
            }
            $num_groupe++;
        }
        // Si le nb de personne est pair
        // on met a jour le nb de personnes
        $nb_personne_new = count($this->groupe); 
        // on fait une boucle $nb_personne-new/2
        for($i=0;$i<=($nb_personne_new/2)-1;$i++)
        {
            // on selectionne les groupes
            for($i2=0;$i2<=1;$i2++)
            {
                // on tire une clé au sort 
                $rand = array_rand($this->groupe);
                // on select la personne en fonction de la clé
                $groupe1[] = $this->groupe[$rand];
                $req3 = $db->prepare('INSERT INTO `random` SET random_groupe = :groupe, random_prenom = :prenom, random_date = CURDATE()');
                $req3->bindValue(':groupe',$num_groupe,PDO::PARAM_STR);
                $req3->bindValue(':prenom',$this->groupe[$rand],PDO::PARAM_STR);
                $req3->execute();
                // on sort l'element du tableau 
                unset($this->groupe[$rand]);
            }
            $num_groupe++;
        }
        return $groupe1;
    }
    // fonction qui tire au sors pour la correction 
    public static function getCorrection($date)
    {
        global $db;
        // on se fait une 1ere requete qui va selectionner le numero du groupe
        $num_groupe = $db->prepare('SELECT random_groupe FROM `random` WHERE random_date = :date ORDER BY RAND() LIMIT 1');
        $num_groupe->bindParam(':date',$date,PDO::PARAM_STR);
        $num_groupe->execute();
        if($num_groupe->rowCount() == 1)
        {
            $numero_groupe = $num_groupe->fetch(PDO::FETCH_OBJ);
            // on selectionne les personnes du groupe 
            $req = $db->prepare('SELECT * FROM `random` WHERE random_date = :date AND random_groupe = :groupe');
            $req->bindParam(':date',$date,PDO::PARAM_STR);
            $req->bindParam(':groupe',$numero_groupe->random_groupe,PDO::PARAM_INT);
            $req->execute();
            if($req->rowCount() >=1)
            {
                $personnes = $req->fetchAll(PDO::FETCH_OBJ);
                return $personnes;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}
?>