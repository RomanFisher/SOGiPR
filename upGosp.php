<?php
include __DIR__.'/db.php';
$idG = $_POST['id'];
$name = $_POST['name'];
$adres = $_POST['adres'];
$tel = $_POST['tel'];
$login = $_POST['login'];
$kategory = $_POST['kategory'];
$komuPr = $_POST['komuPr'];
$data = $db->prepare("UPDATE `gospital` SET `name`='$name',`email`='$login',`locale`='$adres',`kategory`='$kategory',`numPhon`='$tel',`komuPidPor`='$komuPr' WHERE  `id` = '$idG' ");
$data->execute();
echo "<script>alert(\"Оновленно\");</script>"; 
header('Location:  \gostShow.php');?>