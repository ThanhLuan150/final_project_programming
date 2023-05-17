<?php
// nhan dữ liệu từ form
$name_blogs= $_POST['name_blogs'];
$image= $_POST['image'];
$description = $_POST['description'];
// ket nối csdl
require_once '../connect.php';
// viết lệnh sql them du lieu
$addsql="INSERT INTO blogs
(name_blogs, image,description ) 
VALUES ('$name_blogs','$image', '$description')";
if(mysqli_query($conn, $addsql)){
header("location: blog.php");
};
?>