<?php
require('classes/class.client.php');
$client1 = new Client();
// On donne un nom au client
$client1 ->setNom('Sockeel');
// On donne un prenom au client
$client1 ->setPrenom('Philemon');
// On donne un email au client
$client1 ->setEmail('Philemon@gmail.com');
// On donne un telephone au client
$client1 ->setTelephone('0612124578');
// On donne un mot de passe au client
$client1 ->setMotdepasse('lol');

$client2 = new Client();
// On donne un nom au client
$client2 ->setNom('Dubouchaud');
// On donne un prenom au client
$client2 ->setPrenom('Jessica');
// On donne un email au client
$client2 ->setEmail('jessica@gmail.com');
// On donne un telephone au client
$client2 ->setTelephone('0612004948');
// On donne un mot de passe au client
$client2 ->setMotdepasse('genshin');

// On affiche le prénom
echo $client1->getPrenom().'<br />';
echo $client2->getPrenom();
// voir toutes les infos du client
var_dump($client1->getInformations());
// changer le prenom du client
$client1->setPrenom('Phil');
// voir le changement
echo $client1->getPrenom();
// voir toutes les infos du client
var_dump($client1->getInformations());
var_dump($client2->getInformations());
// ne marche pas on peut l'appeler que dans la classe car c'est une methode privé
/*$client1->genererCle('cci18000');*/
?>