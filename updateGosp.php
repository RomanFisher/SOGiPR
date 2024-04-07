<?php
include "valid/databases.php";
include "valid/classes.php";
include __DIR__.'/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main_style.css">
</head>
<body>
    <?php 
    $idG = $_GET['id'];
    if($_COOKIE['user']==''){
        header('Location: /tt.php');
    }
    else {
    ?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-targer=".navbar-collapse" >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SOGiPR</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar_menu">
                    <li><a href="#" >Лікарі</a>
                    <ul class="nav">
                        <li><a href="docterAdd.php">Додати</a></li>
                        <li><a href="docterShow.php">Переглянути</a></li>
                        <li><a href="director_archive.php">Редактувати</a></li>
                    </ul></li>

                    <li><a href="#" >Госпіталі</a>
                    <ul class="nav">
                        <li><a href="gostAdd.php">Додати</a></li>
                        <li><a href="gostShow.php">Переглянути</a></li>
                        <li><a href="gospitalDow.php">Довідка</a></li>
                    </ul></li>
                    <li><a href="#" >Адміни</a>
                    <ul class="nav">
                        <li><a href="adminAdd.php">Додати</a></li>
                        <li><a href="adminShow.php">Переглянути</a></li>
                        <li><a href="director_archive.php">Редактувати</a></li>
                    </ul></li>
                    <li><a href="tt.php">Профіль</a></li>
                </ul>
            </div>
        </div>
    </div>
<br><br><br>
<div class="container mt-4">
        <h1>Оновлення госпіталю</h1>
        <form action="upGosp.php" method="post">
            <?php
$data = $db->prepare("SELECT * FROM `gospital` WHERE `id` = '$idG'");
$data->execute();
$adm = $data->fetchAll();
 $adm=$adm[0];?>
            <input  type="text" class="form-control" name="name" value="<?=$adm['name'];?>"
            id="name" placeholder="Введіть назву госпіталю"><br>
            <input value="<?=$adm['email'];?>" type="text" class="form-control" name="login"
            id="login" placeholder="Введіть логін"><br>
            <input value="<?=$adm['locale'];?>" type="text" class="form-control" name="adres"
            id="adres" placeholder="Введіть адресу госпіталю або адресу будівлі поблизу"><br>
            <input value="<?=$adm['numPhon'];?>" type="text" class="form-control" name="tel"
            id="tel" placeholder="Введіть номер телефону в форматі +380XXXXXXXXX"><br><h4 style="color:red;">Обов'язково заповніть це поле правильно наново !!!</h4>
            <h4>Кому підпорядковується медичний заклад</h4>
            <select value="<?=adm['komuPidPor'];?>" class="form-control" name="komuPr" id="komuPr">
                <option value="Державна лікарня"selected>Державна лікарня</option>
                <option value="Приватна лікарня">Приватна лікарня</option>
                <option value="Державній прикордонній службі Україні">Державній прикордонній службі Україні</option>
                <option value="Національній гвардії України">Національній гвардії України</option>
            </select><br>
            <h4 style="color:red;">Обов'язково заповніть це поле правильно наново !!!</h4>
            <h4>До якої категорії належить</h4>
            <select class="form-control" name="kategory" id="kategory">
                <?php 
                $dat = $db->prepare("SELECT * FROM `gospitDpv`");
                $dat->execute();
                $admb = $dat->fetchAll();
                foreach ($admb as $gosInfo):
                ?>
                <option value="<?=$gosInfo['id']?>"selected><?=$gosInfo['name']?></option>
                <?php endforeach;?>
            </select><br>
            <button class="btn btn-success" type="submit" >Оновити</button><br><br><input type="hidden" name="id" value="<?=$adm['id'];?>">
        </form>
    </div>
    <?php 
        }
            ?>
</body>
</html>