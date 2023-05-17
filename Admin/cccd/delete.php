<?php
//lay du lieu id cần xóa
$id= $_GET['id'];
//echo $id;
// ket noi
require_once '../connect.php';
// cau lenh sql
$delete_sql = "DELETE FROM cccd WHERE id_cccd=$id";
mysqli_query($conn, $delete_sql);
//echo "<h1> xoa thanh cong </h1>";
// tro ve trang liet ke
header("location: cccd.php");
?>
