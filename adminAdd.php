<?php
include "valid/databases.php";
include "valid/classes.php";
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="maskinput.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> -->
    <!-- <script src="js/search_script.js"></script> -->
    
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
        <h1>Додання адміністратора</h1>
        <form action="addFile.php" method="post" enctype="multipart/form-data">
            <input type="text" class="form-control" name="name"
            id="name" placeholder="Введіть ім'я"><br>
            <input type="text" class="form-control" name="surename"
            id="surename" placeholder="Введіть прізвище"><br>

            <input type="text" class="form-control" name="pob"
            id="pob" placeholder="Введіть по батькові"><br>
            
            <input type="text" class="form-control" name="tel"
            id="tel" placeholder="Введіть номер телефону в форматі +380XXXXXXXXX"><br>
            <input type="text" class="form-control" name="login"
            id="login" placeholder="Введіть логін"><br>
            <input type="password" class="form-control" name="pass"
            id="pass" placeholder="Введіть пароль"><br>
            <h3>Завантажте фото адміна </h3><input type="file" name="file"> <br>
            <button class="btn btn-success" type="submit">Додати</button>
           
        </form>
    </div>


    <?php 
        }
            ?>
       

    
</body>
</html>