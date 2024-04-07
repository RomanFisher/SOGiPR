<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main_style.css">
    <link rel="stylesheet" href="css/reg_style.css">
    <title>Log in</title>
</head>
<body>
    <button class="toggle-button" onclick="toggleForms()">Зміна форми</button>
    <?php 
    if($_COOKIE['user']==''){
    ?>
    <div class="container mt-4" >
    <div id="form1" class="form">
        <h1>Aвторизація користувача</h1>
        <form action="valid/auth.php" method="post" >
            <input type="text" class="form-control" name="login"
            id="login" placeholder="Введіть логін"><br>
            <input type="password" class="form-control" name="pass"
            id="pass" placeholder="Введіть пароль"><br>
            <label class="form-control">
            <input class="form-check-input" type="checkbox" value="admin" name="adminCheck"> Ввійти як адмін
            </label>
            <br><br>
            <button class="btn btn-success" type="submit">Увійти</button>
            
            
        </form>
        <?php  
    }
    else
    header('Location: /profile.php');
        ?>
        </div>
    </div>

    <?php 
    if($_COOKIE['gosp']==''){
    ?>
    <div class="container mt-4" >
    <div id="form2" class="form">
        <h1>Авторизація госпіталю</h1>
        <form action="valid/auth_gosp.php" method="post" >
            <input type="text" class="form-control" name="loginG"
            id="loginG" placeholder="Введіть логін"><br>
            <input type="password" class="form-control" name="passG"
            id="passG" placeholder="Введіть пароль">
            <br><br>
            <button class="btn btn-success" type="submit">Увійти</button>
        </form>
        <?php  
    }
    else
    header('Location: /profile_gosp.php');
        ?>
        </div>
    </div>
    <style>

:root {
  --form-control-color: rebeccapurple;
  --form-control-disabled: #959495;
}

.form-control {
  font-family: system-ui, sans-serif;
  font-size: 2rem;
  font-weight: bold;
  line-height: 1.1;
  display: grid;
  grid-template-columns: 1em auto;
  gap: 0.5em;
}



input[type="checkbox"] {
  /* Add if not using autoprefixer */
  -webkit-appearance: none;
  /* Remove most all native input styles */
  appearance: none;
  /* For iOS < 15 */
  background-color: var(--form-background);
  /* Not removed via appearance */
  margin: 0;

  font: inherit;
  color: currentColor;
  width: 1.15em;
  height: 1.15em;
  border: 0.15em solid currentColor;
  border-radius: 0.15em;
  transform: translateY(-0.075em);

  display: grid;
  place-content: center;
}

input[type="checkbox"]::before {
  content: "";
  width: 0.65em;
  height: 0.65em;
  clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
  transform: scale(0);
  transform-origin: bottom left;
  transition: 120ms transform ease-in-out;
  box-shadow: inset 1em 1em var(--form-control-color);
  /* Windows High Contrast Mode */
  background-color: CanvasText;
}

input[type="checkbox"]:checked::before {
  transform: scale(1);
}

input[type="checkbox"]:focus {
  outline: max(2px, 0.15em) solid currentColor;
  outline-offset: max(2px, 0.15em);
}

input[type="checkbox"]:disabled {
  --form-control-color: var(--form-control-disabled);

  color: var(--form-control-disabled);
  cursor: not-allowed;
}

        h1 {
  color: #f3e801;
}
    #form1 {
    display: block;
    }
    #form2 {
    display: none;
    }
    .toggle-button {
  display: block;
  margin: 0 auto; /* відцентрувати по горизонталі */
  padding: 10px 20px;
  font-size: 16px;
  color: #000000;
  background-color: #f3e801;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.toggle-button:hover {
  background-color: #f3e801;
}

.toggle-button:focus {
  outline: none;
  box-shadow: 0 0 0 0.2rem #f3e801;
}
body {
  background-color: #1e1e1e;
}
    </style>
    <script>        
        function toggleForms() {
                var form1 = document.getElementById("form1");
                var form2 = document.getElementById("form2");
                
                if (form1.style.display === "none") {
                    form1.style.display = "block";
                    form2.style.display = "none";
                } else {
                    form1.style.display = "none";
                    form2.style.display = "block";
                }
                }
    </script>
</body>
</html>