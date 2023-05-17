<?php
session_start();
// Hủy tất cả các biến session

// Đưa người dùng về trang đăng nhập
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login\
    unset($_SESSION['id_user']);
    unset($_SESSION['cart']);
    $_SESSION['total_cart'] = 0;
    $_SESSION['total_quantity']= 0;
    header("location: ../views/home.view.php");
}exit;
?>
