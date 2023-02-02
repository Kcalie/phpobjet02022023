<?php
class Client 
{
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $motdepasse;

    // Methode privé
    private function genererCle($mdp)
    {
        return sha1(md5($mdp)); // cryptage du mot de passe
        //return password_hash($mdp, PASSWORD_BCRYPT); //(plus compliqué a decrypté mais attention en changeant de server ya de grande chance que ça ne marche pas)
    }

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
    // setter pour l'email
    public function setEmail($email)
    {
        $this->email = $email;
    }
    // setter pour le telephone
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
    // setter pour le motdepasse
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = self::genererCle($motdepasse);// self pour appeler la methode genererCle
    }

    // Getter pour le nom
    public function getNom()
    {
        return $this->nom;
    }
    // Getter pour le prenom
    public function getPrenom()
    {
        return $this->prenom;
    }
    // Getter pour l'email
    public function getEmail()
    {
        return $this->email;
    }
    // Getter pour le telephone
    public function getTelephone()
    {
        return $this->telephone;
    }
    // Getter pour le motdepasse
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }
    // Getter qui retourne les informations
    public function getInformations()
    {
        $client = array('nom' => $this->nom,
                        'prenom' => $this->prenom,
                        'email' => $this->email,
                        'telephone' => $this->telephone,
                        'motdepasse' => $this->motdepasse,
                        );
        return $client;
    }
}

?>