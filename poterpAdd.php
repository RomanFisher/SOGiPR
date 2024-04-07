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
                    
                    <li><a href="#" >Потерпілий</a>
                    <ul class="nav">
                        <li><a href="poterpAdd.php">Додати</a></li>
                        <li><a href="poterpShow.php">Переглянути</a></li> 
                    </ul></li>
                    <li><a href="docMain.php">Профіль</a></li>
                </ul>
            </div>
        </div>
    </div>
<br><br><br>
<div class="container mt-4">
        <h1>Додання потерпілого</h1>
        <form action="addPoterp.php" method="post" enctype="multipart/form-data">
            <input class="form-check-input" type="checkbox" value="Невідомий" name="neVid"> Невідомий<br><br>
            <input type="text" class="form-control" name="name"
            id="name" placeholder="Введіть ім'я"><br>
            <input type="text" class="form-control" name="surename"
            id="surename" placeholder="Введіть прізвище"><br>
            <input type="text" class="form-control" name="grKrow"
            id="grKrow" placeholder="Введіть групу крові, якщо відомо"><br>
            <h4>Стать</h4>
            <select class="form-control" name="stat" id="stat">
                <option value="Чоловік"selected>Чоловік</option>
                <option value="Жінка">Жінка</option>
            </select><br>
            <h4>Приналежість</h4>
            <select class="form-control" name="prnal" id="prnal">
                <option value="Військовий"selected>Військовий</option>
                <option value="Цивільний">Цивільний</option>
            </select><br>
            <h4>Вид поранення</h4>
            <select class="form-control" name="typeP" id="typeP">
                <option value="Вогнепальне"selected>Вогнепальне</option>
                <option value="Ядерне">Ядерне</option>
                <option value="Хімічне">Хімічне</option>
                <option value="Термічне">Термічне</option>
                <option value="Колоте">Колоте</option>
                <option value="Інфекційне">Інфекційне</option>
                <option value="Механічна травма">Механічна травма</option>
            </select><br>
            <input type="text" class="form-control" name="turniket"
            id="turniket" placeholder="Коли був накладений турнікет, або лишіть порожнім це поле"><br>
            <h4>Що поранено</h4>
            <input class="form-check-input" type="checkbox" value="М'які тканини" name="mya"> М'які тканини
            <input class="form-check-input" type="checkbox" value="Кістки" name="ki"> Кістки
            <input class="form-check-input" type="checkbox" value="Судини" name="cu"> Судини
            <input class="form-check-input" type="checkbox" value="Порожнині поранення" name="po"> Порожнині поранення
            <input class="form-check-input" type="checkbox" value="Опіки" name="op"> Опіки<br><br>
            <h4>Транспортування</h4>
            <input class="form-check-input" type="checkbox" value="Лежачи" name="le"> Лежачи
            <input class="form-check-input" type="checkbox" value="Сидячи" name="sy"> Сидячи
            <input class="form-check-input" type="checkbox" value="Без різниці" name="bez"> Без різниці<br>
            <br>
            <input type="text" class="form-control" name="poran"
            id="poran" placeholder="Введіть де поранення"><br>
            <h4>Евакуйовано</h4>
            <select class="form-control" name="evak" id="evak">
                <option value="Наземним транспортом"selected>Наземним транспортом</option>
                <option value="Повітряним транспортом">Повітряним транспортом</option>
                <option value="Водним транспортом">Водним транспортом</option>
            </select><br>
            <input type="text" class="form-control" name="dodInf"
            id="dodInf" placeholder="Додаткова інформація за необхідності"><br>
            <h3>Завантажте додатково фото за потрібності </h3><input type="file" name="file"> <br>
            <h4>До якого доспіталя надіслати потерпілого</h4>
            <select class="form-control" name="gosp" id="gosp">
                <?php 
                $data = $db->prepare("SELECT * FROM `gospital`");
                $data->execute();
                $adm = $data->fetchAll();
                foreach ($adm as $gosInfo):
                ?>
                <option value="<?=$gosInfo['id']?>"selected><?=$gosInfo['name']?></option>
                <?php endforeach;?>
            </select><br>
            <button class="btn btn-success" type="submit">Додати</button><br><br><br>
        </form>
    </div>
    <?php 
        }
            ?>
</body>
</html>