<?php
// inclusion de la classe random
require_once('classes/class.random.php');
// je recup la date de la veille avec date et strtotime()
$date = date('Y-m-d', strtotime('-1 day'));
// je fais appel a la methode getCorrection dans la class random
$personnes = Random::getCorrection($date);
$prenom = array();
foreach($personnes as $p)
{
    $prenom[] = $p->random_prenom;
}
echo json_encode($prenom);

?>