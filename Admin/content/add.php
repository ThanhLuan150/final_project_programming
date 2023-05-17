<?php
// nhan dữ liệu từ form
$id_categories= $_POST['id_categories'];
$description= $_POST['description'];
require_once '../connect.php';
// viết lệnh sql them du lieu
$themsql="INSERT INTO contents
(id_categories, description ) 
VALUES ('$id_categories', '$description')";
if(mysqli_query($conn, $themsql)){
header("location: content.php");
};
?>