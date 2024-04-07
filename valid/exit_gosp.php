<?php
    setcookie('gosp', $user['name'], time() - 3600 * 6, "/");
    setcookie('id', $user['id'], time() - 3600 * 6, "/");  
    header('Location: /tt.php');
?>