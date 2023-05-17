<?php
// nhan dữ liệu từ form
$nameuser= $_POST['nameuser'];
$email = $_POST['email'];
$tieude = $_POST['tieude'];
$noidung = $_POST['noidung'];
// ket nối csdl
require_once '../connect.php';
// viết lệnh sql them du lieu
$addsql="INSERT INTO lienhe
( nameuser, email, tieude, noidung ) 
VALUES ( '$nameuser', '$email ','$tieude', '$noidung')";
if(mysqli_query($conn, $addsql)){
header("location: contact.php");
};
?>