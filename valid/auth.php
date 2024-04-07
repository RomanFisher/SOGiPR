<?php

    

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    $adm = filter_var(trim($_POST["adminCheck"]), FILTER_SANITIZE_STRING);
    //$pass=md5($pass."tllcswe25d6");
    
    $mysql = new mysqli('localhost','root','','SOGiPR');
    if($adm == "admin")
    {
        $result = $mysql->query("SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$pass'");
        
        $admin = $result->fetch_assoc();
        if(count($admin)==0){
            echo "Такого користувача не існує(";
            exit();
        }
        setcookie('user', $admin['name'], time() + 3600 * 6, "/");  
        setcookie('id', $admin['id'], time() + 3600 * 6, "/");  
        header('Location: /profile.php');
    }else{
        $result = $mysql->query("SELECT * FROM `doctor` WHERE `login` = '$login' AND `password` = '$pass'");
        $doc = $result->fetch_assoc();
        if(count($doc)==0){
            echo "Такого користувача не існує(";
            exit();
        }
        setcookie('user', $doc['name'], time() + 3600 * 6, "/");  
        setcookie('id', $doc['id'], time() + 3600 * 6, "/");  
        header('Location: /docMain.php');
    }
    $mysql->close();
       // echo("Привіт ".$user);
   
?>