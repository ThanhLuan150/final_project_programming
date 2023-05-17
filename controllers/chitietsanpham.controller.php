<?php
// Kết nối tới cơ sở dữ liệu
include_once('../Models/allitems.model.php');
if (!isset($_SESSION)) {
    session_start();
}
// Lấy id_categories từ form submit lọc sản phẩm
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $rows = allitems();
    // print_r($rows);
    foreach ($rows as $key => $value) {
        if ($id == $value["id_clothes"]) {
            $_SESSION['detail'] = $rows[$key];
            header('location: ../views/chitietsanpham.view.php');
        }
    }
}
//unset($_SESSION['detail']);
//print_r($_SESSION['detail']);
