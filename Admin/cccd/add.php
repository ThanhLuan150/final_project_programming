<?php
// nhan dữ liệu từ form
$id_bill_detail= $_POST['id_bill_detail'];
$front_image= $_POST['front_image'];
$back_image= $_POST['back_image'];
require_once '../connect.php';
// viết lệnh sql them du lieu
$themsql="INSERT INTO cccd
(id_bill_detail, front_image,back_image   ) 
VALUES ('$id_bill_detail', '$front_image', '$back_image')";
if(mysqli_query($conn, $themsql)){
header("location: cccd.php");
};
?>