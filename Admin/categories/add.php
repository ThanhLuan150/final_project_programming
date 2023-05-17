<?php
// nhan dữ liệu từ form
$name_categories= $_POST['name_categories'];
$rent_prices = $_POST['rent_prices'];
$created_at = $_POST['created_at'];
$updated_at = $_POST['updated_at'];
// ket nối csdl
require_once '../connect.php';
// viết lệnh sql them du lieu
$addsql="INSERT INTO categories
( name_categories, rent_prices, created_at, updated_at  ) 
VALUES ( '$name_categories', '$rent_prices','$created_at', '$updated_at')";
if(mysqli_query($conn, $addsql)){
header("location: categories.php");
};
?>