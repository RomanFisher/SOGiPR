<?php

include __DIR__.'/db.php';

$idG = $_GET['id'];

$data = $db->prepare("DELETE FROM `doctor`  WHERE  `id` = '$idG' ");
$data->execute();
echo "<script>alert(\"Видалено\");</script>"; 
header('Location:  \docterShow.php');?>