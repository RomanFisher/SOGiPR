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
    <title>SOGiPR</title>
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
    
<div class="films">
        <div class="container mt-4">

            <?php 
            $dat = $db->prepare("SELECT * FROM `gospital`");
            $dat->execute();
            $admb = $dat->fetchall();
            $data = $db->prepare("SELECT * FROM `poterp`");
            $data->execute();
            $adm = $data->fetchAll();
               foreach ($adm as $gg)
               { if($_COOKIE['id']==$gg['doctor']){
                    ?>
                <div class="main">
    
                    <div class="row searched">
                        <div class="col-md-6">
                            <div class="image">
                                <img src="/img/poterp/<?php echo $gg['photo']?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title">
                                
                                <h3 name="responsed_film" id="responsed_film" > <?php echo"ID: ".$gg['id']."   "; if($gg['surname']==""){echo "Невідомий";} else{echo $gg['surname'];}?> <?=$gg['name']?>  </h3><br>
                                <p3> <?php echo "Приналежність : ".$gg['prynal']?> </p3><br>
                                <p3> Тип поранення :  <?php echo $gg['typePor']; ?> </p3><br>
                                <p3> Година накладання турнікета : <?php echo $gg['turniker']; ?> </p3><br>
                                <p3> Група крові  : <?php echo $gg['grKrow']; ?> </p3><br>
                                <p3> Що зазнало ураження :  <?php echo $gg['poran']; ?> </p3><br>
                                <p3> Спосіб транспортування : <?php echo $gg['typeTran']; ?> </p3><br>
                                <p3> Місце поранення  : <?php echo $gg['wPoran']; ?> </p3><br>
                                <p3> Чим евакуйовано :  <?php echo $gg['chymEvak']; ?> </p3><br>
                                <p3> Додаткова інформація за наявності : <?php echo $gg['dodInfa']; ?> </p3><br>
                                <p3> Стать  : <?php echo $gg['stat']; ?> </p3><br>
                                <p3> Куди направлено : 
                                    <?php 
                                     foreach ($admb as $ggg)
                                     { 
                                        if($ggg['id'] == $gg['gospit']){
                                        echo $ggg['name']; 
                                        }
                                    ?>
                                    
                                </p3><br>
                            </div><br>
                        </div>
                        <hr>
                    
                    <br>
               
                <br>
    <?php 
                } }}}
            ?>
        </div></div></div>
</div>
</body>
</html>