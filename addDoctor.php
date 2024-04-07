<?php
include __DIR__.'/db.php';

if(!empty($_FILES['file']))
{
    $file= $_FILES['file'];
    $namef= $file['name'];
    $pathFile = __DIR__.'/img/doctor/'.$namef;

    if(!move_uploaded_file($file['tmp_name'],$pathFile))
    {
        echo'Файл не був загружений';
    }
    $name = $_POST['name'];
    $surename = $_POST['surename'];
    $pob = $_POST['pob'];
    $tel = $_POST['tel'];
    $login = $_POST['login'];
    $pass = $_POST['pass'];   
    $spec = $_POST['spec'];
    $kvalif = $_POST['kv'];
    if(mb_strlen($name) < 1 || mb_strlen($name) > 40){
        echo "Неправильна довжина імені";
        exit();
    } 
    else if(mb_strlen($tel) < 8 || mb_strlen($tel) > 15){
        echo "Неправильна довжина номеру телефону";
        exit();
    } else if(mb_strlen($login) < 4 || mb_strlen($login) > 20){
        echo "Неправильна довжина логіна";
        exit();
    } else if(mb_strlen($pass) < 4 || mb_strlen($pass) > 20){
        echo "Неправильна довжина пароля (від 4 до 20 символів)";
        exit();
    }
    
    $resu = $db->prepare("SELECT `login` FROM `doctor`");
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

    $data = $db->prepare("INSERT INTO `doctor` (`name`,`surname`,`poB`,`login`,`password`,`special`,`numPhon`,`photo`,`kvalif`) VALUES ('$name','$surename','$pob','$login','$pass','$spec','$tel','$namef','$kvalif')");
    $data->execute();
   
    echo "<script>alert(\"Лікар доданий\");</script>"; 
    header('Location:  \docterAdd.php');
    }
    else
    {
       
       echo 'Диний логін вже занятий'; 
   
    }
}?>