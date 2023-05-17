<?php
// Kết nối tới cơ sở dữ liệu
include_once('../Models/locsanpham.model.php');
if (!isset($_SESSION)) {
    session_start();
}
// Lấy id_categories từ form submit lọc sản phẩm
if (isset($_GET['id_categories'])) {
    $id_categories = $_GET['id_categories'];
    $rows= find_item($id_categories);
    if (is_array($rows) && count($rows) > 0) {
        $_SESSION['locsanpham'] = $rows;
        header('location: ../views/locsanpham.view.php');
    } 

}
//unset($_SESSION['locsanpham']);
//print_r($_SESSION['locsanpham']);
