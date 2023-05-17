<?php
// nhan dữ liệu từ form
$image= $_POST['image'];
$name_clothes= $_POST['name_clothes'];
$sex= $_POST['sex'];
$description = $_POST['description'];
$id_categories = $_POST['id_categories'];
$created_at = $_POST['created_at'];
$updated_at = $_POST['updated_at'];
// ket nối csdl
require_once '../connect.php';
// viết lệnh sql them du lieu
$themsql="INSERT INTO clothes
(image, name_clothes, sex,description,id_categories, created_at, updated_at  ) 
VALUES ('$image', '$name_clothes', '$sex', '$description', '$id_categories', '$created_at', '$updated_at')";
if(mysqli_query($conn, $themsql)){
header("location: clothes.php");
};
?>