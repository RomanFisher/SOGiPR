<?php 
    if($_COOKIE['gosp'] == '') {
        header('Location: /tt.php');
    } else {
        require_once "headerGosp.php";
        $id = $_GET['id'];
        $historG = $_COOKIE['gosp'].'  /  ';
        $selectedOption = intval($_COOKIE['id']);
        $data = $db->prepare("UPDATE `poterp` SET `gospit`='$selectedOption',`new` = 1, `historyGosp` = '$historG'  WHERE `id` = '$id'");
        $data->execute();
        echo "<script>alert('Потерпілого прийнято'); setTimeout(function() { window.location.href = 'profile_gosp.php'; }, 0);</script>";
    }
?>
