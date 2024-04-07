
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
        <div>
            <div class="ff">
            <h2>Ви увійшли в акаунт</h2>
            <h1 class="search"> <?php echo $_COOKIE['gosp'] ?></h1>
            <img src="/img/gosp/<?= $img['photo']?>" height="400px" width="800px"></div><div class="tt">
        <h3>Щоб вийти з акаунта нитисніть <a href="valid/exit_gosp.php">тут</a></h3></div>
        </div><br></br>
        <div class="contai">
        <h2>Зміна пароля</h2>
        <form action="change_password.php" method="POST">
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
        <?php endforeach; ?>
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
 
    </div>
    <?php }require_once "footer.php";?>