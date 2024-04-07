<?php 
if($_COOKIE['gosp']==''){
    header('Location: /tt.php');
}
else {
    require_once "headerGosp.php";
    $id = $_COOKIE['id'];
    $data = $db->prepare("SELECT * FROM `poterp` WHERE `gospit` = '$id' AND `new` = 1");
    $data->execute();
    $adm = $data->fetchAll();
       foreach ($adm as $gg)
       {    
?>
<style>
    body {
            padding: 20px;
        }
        .search-form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }
        .search-input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            flex: 1;
            width: 500px;
        }
        .search-btn {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-btn:hover {
            background-color: #45a049;
        }
        .search-btn:active {
            background-color: #3e8940;
        }
        .search-select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            max-width: 200px;
        }
        @media (max-width: 480px) {
            .search-form {
                flex-direction: column;
                align-items: stretch;
            }
            .search-input {
                margin-bottom: 10px;
            }
        }
        button, input, optgroup, select, textarea {
    margin: 15px;
    font: inherit;
    color: inherit;
}
    </style>
 <div>
        <form class="search-form" action="search_result.php" method="POST">
            <label class="search-label">
                <input type="text" class="search-input" name="search" placeholder="Введіть дані для пошуку">
                
            </label><button type="submit" name="submit" class="search-btn">ПОШУК</button>
            <select name="category">
                <option value="name">Ім'я</option>
                <option value="id">ID</option>
                <option value="surname">Прізвище</option>
                <option value="prynal">Приналежність</option>
                <option value="typePor">Тип поранення</option>
                <option value="grKrow">Група крові</option>
                <option value="poran">Що поранено</option>
                <option value="typeTran">Як можна транспортувати</option>
                <option value="wPoran">В що поранений/а</option>
                <option value="chymEvak">Чим евакуювали</option>
                <option value="dodInfa">Додаткова інформація</option>
                <option value="stat">Стать</option>
            </select>
        </form>
    </div><br>
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
                        if($gg['surname']=="") {
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
<style>.container {
    padding-left: 0px;
}</style>
<?php }}
require_once "footer.php";?>
   