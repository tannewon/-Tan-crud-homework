<?php
include("./database/database.php");
function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = input($_POST['name']);
    $age = input($_POST['age']);
    $email = input($_POST['email']);
    $image_url   = input($_POST['image_url']);
    $student = createStudent($_POST);
    if ($student) {
        echo '<script>alert("Tạo thành công!")</script>';
        header('Location: index.php');
        exit;
    };
}