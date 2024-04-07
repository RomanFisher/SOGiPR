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
    
<div class="films">
        <div class="container mt-4">

            <?php 

            $data = $db->prepare("SELECT * FROM `gospital`");
            $dat = $db->prepare("SELECT * FROM `gospitDpv`");
            $data->execute();
            $dat->execute();
            $admb = $dat->fetchall();
            $adm = $data->fetchAll();
               foreach ($adm as $gg)
               { 
                    ?>
                <div class="main">
    
                    <div class="row searched">
                        <div class="col-md-6">
                            <div class="image">
                                <img src="/img/gosp/<?php echo $gg['photo']?>" alt="">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="title">
                                <h3 name="responsed_film" id="responsed_film" > <?php echo $gg['name'] ?>  </h3><br>
                                <p3> <?php echo "Email : ".$gg['email']?> </p3><br>
                                <p3> Телефон для зв'язку :  <?php echo $gg['numPhon']; ?> </p3><br>
                                <p3> Адрес :  <?php echo $gg['locale']; ?> </p3><br><br>
                                <p3> Категорія : <?php  
                                 foreach ($admb as $ggg)
                                 { 
                                    if($ggg['id'] == $gg['kategory']){
                                    echo $ggg['name']; 
                                    }
                                    
                                ?>
                                </p3>
                                <?php }
                                 ?>
                                 <a href="gospitalDow.php">більше</a><br>
                                <p3>Тип : <?=$gg['komuPidPor']?></p3><br>
                                <a class="btn btn-success btn-sm" href="updateGosp.php?id=<?=$gg['id']?>">Оновити</a>
                                <a class="btn btn-danger btn-sm" href="delGosp.php?id=<?=$gg['id']?>">Видалити</a>
                            </div><br>
                        </div>
                        <hr>
                    </div>
                    <br>
                </div>
                <br>
                <?php
                    }}  ?>
        </div>
    </div>   
</body>
</html>