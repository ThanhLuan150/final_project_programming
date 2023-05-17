<?php 
require_once '../connect.php';
$id= $_GET['id'];
// Kiểm tra xem bản ghi có tồn tại trong bảng bill_detail hay không
$check_sql = "SELECT id_clothes FROM bill_detail WHERE id_clothes=$id";
$result = mysqli_query($conn, $check_sql);
if(mysqli_num_rows($result) > 0){
  // Nếu tồn tại, xóa tất cả các bản ghi trong bảng bill_detail có khóa ngoại trỏ đến bản ghi trong bảng clothes
  $delete_sql = "DELETE FROM bill_detail WHERE id_clothes=$id";
  mysqli_query($conn, $delete_sql);
}

// Xóa bản ghi trong bảng clothes
$xoa_sql = "DELETE FROM clothes WHERE id_clothes=$id";
mysqli_query($conn, $xoa_sql);

header("location: clothes.php");
?>
