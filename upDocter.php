<?php
include __DIR__.'/db.php';
    $idD = $_POST['id'];
    $name = $_POST['name'];
    $surename = $_POST['surename'];
    $pob = $_POST['pob'];
    $tel = $_POST['tel'];
    $login = $_POST['login'];
    $spec = $_POST['spec'];
    $kvalif = $_POST['kv'];
    $data = $db->prepare("UPDATE `doctor` SET `name`='$name',`surname`='$surename',`poB`='$pob',`login`='$login',`special`='$spec',`numPhon`='$tel',`kvalif`='$kvalif' WHERE `id` = '$idD'");
    $data->execute();
    echo "<script>alert('Лікар оновлений'); setTimeout(function() { window.location.href = 'docterShow.php'; }, 3000);</script>"; 
    header('Location:  \docterShow.php');
?>