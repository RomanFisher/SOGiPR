<?php
include __DIR__.'/db.php';

if(!empty($_FILES['file']))
{
    $file= $_FILES['file'];
    $namef= $file['name'];
    $pathFile = __DIR__.'/img/poterp/'.$namef;
    $errors = [];
    if(!move_uploaded_file($file['tmp_name'],$pathFile))
    {
        $errors[] = 'Файл не був загружений';
    }
    


    if (empty($_POST['name'])) {
        if (!isset($_POST['neVid'])) {
        $errors[] = "Поле 'Ім'я' не заповнене.";
        }
    }

    if (empty($_POST['surename'])) {
        if (!isset($_POST['neVid'])) {
        $errors[] = "Поле 'Прізвище' не заповнене.";
    }}

    if (empty($_POST['grKrow'])) {
        $errors[] = "Поле 'Група крові' не заповнене.";
    }

    if (empty($_POST['stat'])) {
        $errors[] = "Поле 'Стать' не вибране.";
    }

    if (empty($_POST['prnal'])) {
        $errors[] = "Поле 'Приналежність' не вибране.";
    }

    if (empty($_POST['typeP'])) {
        $errors[] = "Поле 'Вид поранення' не вибране.";
    }


    if (!isset($_POST['le']) && !isset($_POST['sy']) && !isset($_POST['bez'])) {
        $errors[] = "Поле 'Транспортування' не вибране.";
    }

    if (empty($_POST['poran'])) {
        $errors[] = "Поле 'Де поранення' не заповнене.";
    }

    if (empty($_POST['evak'])) {
        $errors[] = "Поле 'Евакуйовано' не вибране.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div style='background-color: #ff3e3e; color: #000000; padding: 10px; font-size: 16px; width: 50%; margin: 0 auto;'>
                <p3>$error</p3><br></br>
            </div>";
        }
        exit;
    }
    
    $neVid = filter_var(trim($_POST["neVid"]), FILTER_SANITIZE_STRING);
    $name = $_POST['name'];
    $sname = $_POST['surename'];
    $grKrow = $_POST['grKrow'];
    $stat = $_POST['stat'];
    $prnal = $_POST['prnal'];
    $typeP = $_POST['typeP'];    
    $turniket = $_POST['turniket'];
    //$komuPr = $_POST['komuPr'];
    //що поранено
    $mya = filter_var(trim($_POST["mya"]), FILTER_SANITIZE_STRING);
    $ki = filter_var(trim($_POST["ki"]), FILTER_SANITIZE_STRING);
    $cu = filter_var(trim($_POST["cu"]), FILTER_SANITIZE_STRING);
    $po = filter_var(trim($_POST["po"]), FILTER_SANITIZE_STRING);
    $op = filter_var(trim($_POST["op"]), FILTER_SANITIZE_STRING);
    $fullPOR = "";
    if($mya == "М'які тканини"){$fullPOR = $fullPOR." М'які тканини";}
    if($ki == "Кістки"){$fullPOR = $fullPOR." Кістки";}
    if($cu == "Судини"){$fullPOR = $fullPOR." Судини";}
    if($po == "Порожнині поранення"){$fullPOR = $fullPOR." Порожнині поранення";}
    if($op == "Опіки"){$fullPOR = $fullPOR." Опіки";}
    //транспортування
    $le = filter_var(trim($_POST["le"]), FILTER_SANITIZE_STRING);
    $sy = filter_var(trim($_POST["sy"]), FILTER_SANITIZE_STRING);
    $bez = filter_var(trim($_POST["bez"]), FILTER_SANITIZE_STRING);
    $fullTran = "";
    if($le == "Лежачи"){$fullTran = $fullTran." Лежачи";}
    if($sy == "Сидячи"){$fullTran = $fullTran." Сидячи";}
    if($bez == "Без різниці"){$fullTran = " Без різниці";}

    $poran = $_POST['poran'];
    $evak = $_POST['evak'];
 
    $dodInf = $_POST['dodInf'];
    $gosp = $_POST['gosp'];
    $iddoc = $_COOKIE['id'];


try{
    if($neVid == "Невідомий")
    {
    $data = $db->prepare("INSERT INTO `poterp` (`prynal`,`typePor`,`turniker`,`grKrow`,`poran`,`typeTran`,`wPoran`,`chymEvak`,`dodInfa`,`photo`,`gospit`,`doctor`,`stat`) VALUES ('$prnal','$typeP','$turniket','$grKrow','$fullPOR','$fullTran','$poran','$evak','$dodInf','$namef','$gosp','$iddoc','$stat')");
    $data->execute();
    }
    else{
        $data = $db->prepare("INSERT INTO `poterp` (`name`,`surname`,`prynal`,`typePor`,`turniker`,`grKrow`,`poran`,`typeTran`,`wPoran`,`chymEvak`,`dodInfa`,`photo`,`gospit`,`doctor`,`stat`) VALUES ('$name','$sname','$prnal','$typeP','$turniket','$grKrow','$fullPOR','$fullTran','$poran','$evak','$dodInf','$namef','$gosp','$iddoc','$stat')");
        $data->execute();
    }
}
catch (Exception $e) {
    echo 'Помилка: ';
}
    echo "<script>alert(\"Потерпілий доданий\");</script>"; 
    header('Location:  \poterpAdd.php');
}?>