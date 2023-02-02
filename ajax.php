<?php
require_once('classes/class.random.php');
$random = new Random();
echo json_encode($random->setGroupe());
?>