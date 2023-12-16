<?php
include("./database/database.php");
// include("./create_model.php");
$id =htmlspecialchars( $_GET['id']);
$result = deleteStudent($id);
if ($result){
    echo '<script>alert("Tạo thành công!")</script>';
    header('Location: index.php');
    exit;
}