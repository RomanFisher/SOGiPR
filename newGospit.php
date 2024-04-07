
<?php 
    if($_COOKIE['gosp']==''){
        header('Location: /tt.php');
    }
    else {
        require_once "headerGosp.php";
    ?>

    <div class="container mt-4">
        
     <? include __DIR__.'/db.php';
        $id = $_COOKIE['id'];
        $data = $db->prepare("SELECT * FROM `gospital` WHERE `id` = '$id'");
        $data->execute();
        $r = $data->fetchAll();
        foreach($r as $img):
        ?>
       
        <?php endforeach; ?>
        <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

        body {
            background-color: #e8e8e8;
        }
  
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>
    <?php
        $data = $db->prepare("SELECT * FROM `poterp`");
        $data->execute();
        $result = $data->fetchAll();
        }?>
       <table>
       <table>
    <tr>
        <th>ID</th>
        <th>Ім'я</th>
        <th>Прізвище</th>
        <th>Приналежність</th>
        <th>Тип поранення</th>
        <th>Коли поставлений турнікет</th>
        <th>Група крові</th>
        <th>Поранення</th>
        <th>Місце поранення</th>
        <th>Чим евакуювали</th>
        <th>Додаткова інформація</th>
        <th>Стать</th>
    </tr>
    <?php foreach ($result as $row): if($_COOKIE['id']==$row['gospit'] && $row['new'] == NULL){ ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['surname'] ?></td>
            <td><?= $row['prynal'] ?></td>
            <td><?= $row['typePor'] ?></td>
            <td><?= $row['turniker'] ?></td>
            <td><?= $row['grKrow'] ?></td>
            <td><?= $row['poran'] ?></td>
            <td><?= $row['wPoran'] ?></td>
            <td><?= $row['chymEvak'] ?></td>
            <td><?= $row['dodInfa'] ?></td>
            <td><?= $row['stat'] ?></td>
            <td><a class="btn btn-success btn-sm" href="redirectpoterp.php?id=<?=$row['id']?>">Перенаправити</a></td>
            <td><a class="btn btn-success btn-sm" href="accesspoterp.php?id=<?=$row['id']?>">Прийняти</a></td>
        </tr>
    <?php }endforeach; ?>
</table>
    </div>
    <?php require_once "footer.php";?>