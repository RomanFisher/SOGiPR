<?php
include __DIR__.'/db.php';
$idG = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$tel = $_POST['tel'];
$login = $_POST['login'];
$pob = $_POST['pob'];
$data = $db->prepare("UPDATE `admin` SET `name`='$name',`login`='$login',`poB`='$pob',`numPhon`='$tel',`surname`='$surname' WHERE  `id` = '$idG' ");
$data->execute();
echo "<script>alert(\"Оновленно\");</script>"; 
header('Location:  \adminShow.php');?>