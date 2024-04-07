<?php
include __DIR__.'/db.php';
$id = $_GET['id'];
$data = $db->prepare("SELECT * FROM `doctor` WHERE `id` = 14");
$data->execute();
$gg = $data->fetchAll();

$curPass = $_POST['current_password'];
$newPassword = $_POST['new_password'];
$confirmPassword = $_POST['confirm_password'];

if ($curPass != $gg[0]['password']) {
    echo "<script>alert('Старий пароль введено неправильно'); setTimeout(function() { window.location.href = 'docMain.php'; }, 0);</script>";
    exit;
}
if ($newPassword != $confirmPassword) {
    echo "<script>alert('Новий пароль та пароль підтвердження не співпадають'); setTimeout(function() { window.location.href = 'docMain.php'; }, 0);</script>";
    exit;
}

if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/', $newPassword)) {
    echo "<script>alert('Новий пароль має містити принаймні одну велику літеру, одну малу літеру, одну цифру та один спеціальний символ.'); setTimeout(function() { window.location.href = 'docMain.php'; }, 0);</script>";
    exit;
}

$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$updateQuery = $db->prepare("UPDATE `doctor` SET `password` = '$hashedPassword'  WHERE `id` = 14");


if ($updateQuery->execute()) {
    echo "<script>alert('Пароль успішно змінено'); setTimeout(function() { window.location.href = 'docMain.php'; }, 0);</script>";
} else {
    echo "<script>alert('Помилка при зміні пароля'); setTimeout(function() { window.location.href = 'docMain.php'; }, 0);</script>";
}
    ?>