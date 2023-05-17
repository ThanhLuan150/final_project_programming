<?php 
include ('../connect/connect.dp.php');
function userpay($id_user){

    global $conn;
    $bekhoa = "SET SQL_SAFE_UPDATES = 0 ";
    $result = mysqli_query($conn, $bekhoa);
    $sql="SELECT * FROM users where id_users = $id_user " ;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result); // Lấy kết quả truy vấn.
    return $row; // Trả về thông tin sản phẩm.
}

