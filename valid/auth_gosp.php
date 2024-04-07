<?php

    

    $loginG = filter_var(trim($_POST['loginG']), FILTER_SANITIZE_STRING);
    $passG = filter_var(trim($_POST['passG']), FILTER_SANITIZE_STRING);
    //$pass=md5($pass."tllcswe25d6");
    
    $mysql = new mysqli('localhost','root','','SOGiPR');

        $result = $mysql->query("SELECT * FROM `gospital` WHERE `email` = '$loginG' AND `password` = '$passG'");
        
        $gosp = $result->fetch_assoc();
        if(count($gosp)==0){
            echo "Такого госпіталя не існує(";
            exit();
        }
        setcookie('gosp', $gosp['name'], time() + 3600 * 6, "/");  
        setcookie('id', $gosp['id'], time() + 3600 * 6, "/");  
        header('Location: /profile_gosp.php');
   
    $mysql->close();
   
?>