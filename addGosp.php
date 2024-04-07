<?php
include __DIR__.'/db.php';

if(!empty($_FILES['file']))
{
    $file= $_FILES['file'];
    $namef= $file['name'];
    $pathFile = __DIR__.'/img/gosp/'.$namef;
    
    if(!move_uploaded_file($file['tmp_name'],$pathFile))
    {
        echo'Файл не був загружений';
    }
    $name = $_POST['name'];
    $adres = $_POST['adres'];
    $tel = $_POST['tel'];
    $login = $_POST['login'];
    $pass = $_POST['pass'];    //$pass=md5($pass."tllcswe25d6");
    $kategory = $_POST['kategory'];
    $komuPr = $_POST['komuPr'];
    
    /*
    if(mb_strlen($name) < 2 || mb_strlen($name) > 40){
        echo "Неправильна довжина імені";
        exit();
    } else if(mb_strlen($surename) < 3 || mb_strlen($surename) > 40){
        echo "Неправильна довжина прізвища";
        exit();
    }
    else if(mb_strlen($tel) < 8 || mb_strlen($tel) > 15){
        echo "Неправильна довжина прізвища";
        exit();
    } else if(mb_strlen($login) < 4 || mb_strlen($login) > 20){
        echo "Неправильна довжина логіна";
        exit();
    } else if(mb_strlen($pass) < 4 || mb_strlen($pass) > 20){
        echo "Неправильна довжина пароля (від 4 до 20 символів)";
        exit();
    }*/


    $data = $db->prepare("INSERT INTO `gospital` (`name`,`email`,`password`,`locale`,`kategory`,`numPhon`,`photo`,`komuPidPor`) VALUES ('$name','$login','$pass','$adres','$kategory','$tel','$namef','$komuPr')");
    $data->execute();
   
    echo "<script>alert(\"Госпітал доданий\");</script>"; 
    header('Location:  \gostAdd.php');
}?>