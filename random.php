<?php
require('classes/class.random.php');
$tirage = new Random();
//$tirage->setPersonne('Salim');
//$tirage->unsetPersonne('Joseph');
var_dump($tirage->setGroupe());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>tirage au sort</h1>
    <div id="resultat">

    </div>
    <div id="comptearebours">

    </div>
    <button type="button" name="tirage" id="tirage">Tirer au sort</button>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="assets/js/javascript.js"></script>
</body>
</html>