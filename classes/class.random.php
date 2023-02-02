<?php
class Random
{
    public $groupe;
    // on créer le constructeur en initialisant les personnes du groupe
    public function __construct()
    {
        $this->groupe = ['Joseph', 'Kevin', 'Philemon', 'Fransisco', 'Maxime', 'Geoffrey', 'Angeline', 'Emilie', 'Amelie', 'Jessica', 'Gerald'];
    }
    // on va créer les groupes de travail 
    public function setGroupe()
    {
        // recup le nbre de personnes dans le groupe
        $nb_personne = count($this->groupe);
        // si le nbre de personnes est impair
        if($nb_personne%2 == 1)
        {
            // on selectionne 3 personnes dans le groupe
            $groupe1 = array();
            for($i=0;$i<=2;$i++)
            {
                // on tire une clé au sort 
                $rand = rand(0,$nb_personne-1);
                // on va chercher l'elment du tableau
                $groupe1[] = $this->groupe[$rand];
                // on sort l'element selectionné du tableau
                unset($this->groupe[$rand]);
                echo 'groupe de 3:';
                var_dump($this->groupe);
            }
        }
        // Si le nb de personne est pair
        // on met a jour le nb de personnes
        $nb_personne_new = count($this->groupe); 
        // on fait une boucle $nb_personne-new/2
        for($i=0;$i<=($nb_personne_new/2)-1;$i++)
        {
            // on initialize le tableau des groupes
            $groupe2 [$i] = array();
            // on selectionne les groupes
            for($i2=0;$i2<=1;$i2++)
            {
                // on tire une clé au sort 
                $rand = rand(0,$nb_personne_new-1);
                echo $rand.'<br />';
                echo 'nb personne:'.$nb_personne_new.'<br />';
                // on select la personne en fonction de la clé
                $groupe2[$i][] = $this->groupe[$rand];
                // on sort l'element du tableau 
                unset($this->groupe[$rand]);
                // on met a jour $nb_personne_new
                $nb_personne_new = count($this->groupe);
            }
        }
        if(!empty($groupe1))
        {
            $tableau = array_merge_recursive($groupe1,$groupe2);
        }
        else
        {
            $tableau = $groupe2;
        }
        return $tableau;
    }
}
?>