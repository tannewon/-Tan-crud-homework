<?php
include("./database/database.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
    $email = htmlspecialchars($_POST['email']);
    $image_url = htmlspecialchars($_POST['image_url']);
    $studentUpdated = updateStudent($id, $name, $age, $email, $image_url);
    if ($studentUpdated) {
        echo '<script>alert("Cập nhật thành công!")</script>';
        header('Location: index.php');
        exit;
    }
}