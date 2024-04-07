
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
        <h2>Ви увійшли в акаунт</h2><br>
     <? include __DIR__.'/db.php';
        $id = $_COOKIE['id'];
        $data = $db->prepare("SELECT * FROM `doctor` WHERE `id` = '$id'");
        $data->execute();
        $r = $data->fetchAll();
        foreach($r as $img):
        ?>
        <div>
            <div class="ff">
            <img src="/img/doctor/<?= $img['photo']?>" width="200px"></div><div class="tt">
            <h1 class="search">Вітаю лікар, <?php echo $_COOKIE['user'] ?>, в  системі обліку госпіталів</h1>
        <h3>Щоб вийти з акаунта нитисніть <a href="valid/exit.php">тут</a></h3></div>
        </div>
        <?php endforeach; ?>

    </div>
    <?php 
        }

        ?>
            <br></br>
         
        <div class="contai">
        <h2>Зміна пароля</h2>
        <form action="change_pass.php" method="POST">
            <div class="form-group">
                <label for="current_password">Поточний пароль:</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Новий пароль:</label>
                <input type="password" id="new_password" name="new_password" required><br></br>
                <button type="button" id="toggle_password" onclick="togglePasswordVisibility()">Показати пароль</button>
            </div>
            <div class="form-group">
                <label for="confirm_password">Підтвердіть новий пароль:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Змінити пароль">
            </div>
        </form>
        
    </div><br></br>
        <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("new_password");
            var toggleButton = document.getElementById("toggle_password");
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.textContent = "Приховати пароль";
            } else {
                passwordInput.type = "password";
                toggleButton.textContent = "Показати пароль";
            }
        }
    </script>

</body>
</html>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
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

    body {
            font-family: Arial, sans-serif;
        }

        .contai {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="password"],
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
</style>


 