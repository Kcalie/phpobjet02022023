<?php
class Client 
{
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $motdepasse;

    // setter pour le nom
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    // setter pour le prenom
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    // setter pour le telephone
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
    // setter pour le motdepasse
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;
    }
}

?>