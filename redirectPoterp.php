<?php 
    $idG = $_GET['id'];
    if($_COOKIE['gosp']==''){
        header('Location: /tt.php');
    }
    else {
        require_once "headerGosp.php";
        $id = $_GET['id'];
        $data = $db->prepare("SELECT * FROM `poterp` WHERE `id` = '$id'");
        $data->execute();
        $gg = $data->fetchAll();
?>
<div class="container mt-4">
    <div class="main">
        <div class="row searched">
            <div class="col-md-6">
                <form method="POST">
                    <div class="image">
                        <img src="/img/poterp/<?php echo $gg[0]['photo']?>" alt="">
                    </div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <h3 name="responsed_film" id="responsed_film">
                        <?php
                            echo "ID: ".$gg[0]['id']."   ";
                            if($gg[0]['surname']=="") {
                                echo " Невідомий";
                            } else {
                                echo $gg[0]['surname'];
                            }
                        ?>
                        <?=$gg[0]['name']?>
                    </h3><br>
                    <p3> <?php echo "Приналежність : ".$gg[0]['prynal']?> </p3><br>
                    <p3> Тип поранення :  <?php echo $gg[0]['typePor']; ?> </p3><br>
                    <p3> Година накладання турнікета : <?php echo $gg[0]['turniker']; ?> </p3><br>
                    <p3> Група крові  : <?php echo $gg[0]['grKrow']; ?> </p3><br>
                    <p3> Що зазнало ураження :  <?php echo $gg[0]['poran']; ?> </p3><br>
                    <p3> Спосіб транспортування : <?php echo $gg[0]['typeTran']; ?> </p3><br>
                    <p3> Місце поранення  : <?php echo $gg[0]['wPoran']; ?> </p3><br>
                    <p3> Чим евакуйовано :  <?php echo $gg[0]['chymEvak']; ?> </p3><br>
                    <p3> Додаткова інформація за наявності : <?php echo $gg[0]['dodInfa']; ?> </p3><br>
                    <p3> Стать  : <?php echo $gg[0]['stat']; ?> </p3><br><br>
                    <h4 style="color:green;">До якого доспіталя надіслати потерпілого</h4>
                    <select class="form-control" name="gosp" id="gosp">
                        <?php 
                            $data = $db->prepare("SELECT * FROM `gospital`");
                            $data->execute();
                            $adm = $data->fetchAll();
                            $idd = intval($_COOKIE['id']);
                            foreach ($adm as $gosInfo):
                                if($gosInfo['id'] == $idd ){} else{
                        ?>
                            <option value="<?=$gosInfo['id']?>"selected><?=$gosInfo['name']?></option>
                        <?php }endforeach;?>
                    </select><br>
                    <td><input class="btn btn-success btn-sm" type="submit" name="submit" value="Перенаправити"/></td>
                </div><br>
                </form>
                <?php
                 // Обробник форми
        if (isset($_POST['submit'])) {
            $selectedOption = intval($_POST['gosp']);
            $idG = $gg[0]['id'];
            $data = $db->prepare("UPDATE `poterp` SET `gospit`='$selectedOption',`new` = NULL WHERE `id` = '$idG'");
            $data->execute();
            echo "<script>alert('Потерпілого перенаправлено'); setTimeout(function() { window.location.href = 'profile_gosp.php'; }, 0);</script>";
        }?>
            </div>
            <hr>
        </div>
        <br>
    </div>
<?php 
 require_once "footer.php";}?>