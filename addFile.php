

<?php

include __DIR__.'/db.php';

if(!empty($_FILES['file']))
{
    $file= $_FILES['file'];
    $namef= $file['name'];
    $pathFile = __DIR__.'/img/admin/'.$namef;
    $name = $_POST['name'];
    $surename = $_POST['surename'];
    $pob = $_POST['pob'];
    $tel = $_POST['tel'];
    $login = $_POST['login'];
    $pass = $_POST['pass'];    
    if(!move_uploaded_file($file['tmp_name'],$pathFile))
    {
        echo'Файл не був загружений';
    }
    
     if(mb_strlen($tel) < 8 || mb_strlen($tel) > 15){
        echo "Неправильна довжина телефону";
        exit();
    } else if(mb_strlen($pass) < 4 || mb_strlen($pass) > 20){
        echo "Неправильна довжина пароля (від 4 до 20 символів)";
        exit();
    }
    $resu = $db->prepare("SELECT `login` FROM `admin`");
    $resu->execute();
    $res = $resu->fetchAll();
        
    $check=0;
   
    foreach ($res as $log)
    {
        if($log['login']==$login)
        {
            $check=1; 
        }
    }
    if($check==0){

    $data = $db->prepare("INSERT INTO `admin` (`name`,`surname`,`poB`,`login`,`password`,`numPhon`,`photo`) VALUES ('$name','$surename','$pob','$login','$pass','$tel','$namef')");
    $data->execute();
   
    echo "<script>alert('Адмін доданий'); setTimeout(function() { window.location.href = 'adminAdd.php'; }, 0);</script>"; 
    }
    else{
        echo "<script>alert('Даний логін вже зайнятий');</script>"; 
    }
}




































/*
include __DIR__.'/db.php';
include "databases.php";

if(!empty($_FILES['file']))
{
   /* $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $surename = filter_var(trim($_POST['surename']), FILTER_SANITIZE_STRING);
    $pob = filter_var(trim($_POST['pob']), FILTER_SANITIZE_STRING);
    $tel = filter_var(trim($_POST['tel']), FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    *//*
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
    }

   # $pass=md5($pass."tllcswe25d6");

    
    $result = mysqli_query($induction,"SELECT `login` FROM `admin`");

    while ($log=mysqli_fetch_assoc($result)){
        $posts[]=$log;
    }

    $check=0;
    foreach ($posts as $log)
    {
        if($log['login']==$login)
        {
            $check=1; 
        }
    }


    $file= $_FILES['file'];
    $namef= $file['name'];
    $pathFile = __DIR__.'/adminF/'.$namef;

    if(!move_uploaded_file($file['tmp_name'],$pathFile))
    {
        echo'Файл не був загружений';
    }

    #header("Location:  \adminAdd.php");


    #$data = $db->prepare("INSERT INTO `admin` (`name`,`surname`,`poB`,`login`,`password`,`numPhon`,`photo`) VALUES ('$name','$surename','$pob','$login','$pass','$tel',?)");
    #$data->execute([$nameF]);
    
    if($check==0){
    $mysql = new mysqli('localhost','root','','SOGiRP');
    
    $mysql->query("INSERT INTO `admin` (`name`,`surname`,`poB`,`login`,`password`,`numPhon`,`photo`) VALUES('$name','$surename','$pob','$login','$pass','$tel','$namef')");
    #$mysql->execute([$namef]);
    $mysql->close();
  
    header('Location: /adminAdd.php');
    echo "<script>alert(\"Адмін доданий\");</script>"; 
  
    }
    else
    {
       echo "<script>alert(\"Диний логін вже занятий(\");</script>"; 
        header('Location: /adminAdd.php');
    }

   
}
?>*/