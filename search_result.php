<?php
if ($_COOKIE['gosp'] == '') {
    header('Location: /tt.php');
} else {
    require_once "headerGosp.php";
    $id = $_COOKIE['id'];
    $search = $_POST['search'];
    $category = $_POST['category'];
    $data = $db->prepare("SELECT * FROM `poterp` WHERE `gospit` = '$id' AND `new` = 1 AND `$category` = '$search'");
    $data->execute();
    $adm = $data->fetchAll();
    if (isset($_POST['submit']) && $adm != NULL) {
        foreach ($adm as $gg) {
        
            ?>
            <div class="container mt-4">
                <div class="main">
                    <div class="row searched">
                        <div class="col-md-6">
                            <div class="image">
                                <img src="/img/poterp/<?php echo $gg['photo']?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title">
                                <h3 name="responsed_film" id="responsed_film">
                                    <?php
                                        echo "ID: ".$gg['id']."   ";
                                        if ($gg['surname'] == "") {
                                            echo " Невідомий";
                                        } else {
                                            echo $gg['surname'];
                                        }
                                    ?>
                                    <?=$gg['name']?>
                                </h3><br>
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
                                <p3> Історія госпіталізації : <?php echo $gg['historyGosp']; ?> </p3><br><br>
                                <td><a class="btn btn-success btn-sm" href="redirectpoterp.php?id=<?=$gg['id']?>">Перенаправити</a></td>
                            </div><br>
                        </div>
                        <hr>
                    </div>
                    <br>
                </div>
            </div>

            <script>
                // Очищення сторінки при переході
                window.addEventListener('beforeunload', function() {
                    document.body.innerHTML = '';
                });
            </script>

            <?php
        }} else {?>
        
        <div style="background-color: #ffec00; color: #3c3c3c; padding: 10px; font-size: 16px; width: 50%; margin: 0 auto;">
        <p3> За вашим запитом не має співпадінь в базі </p3><br>
        </div>        
    <?php
        }
    }
require_once "footer.php";
?>