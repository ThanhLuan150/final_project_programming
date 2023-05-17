<?php

// Kết nối tới cơ sở dữ liệu
include_once('../Models/timkiem.model.php');
if (!isset($_SESSION)) {
    session_start();
}
// Lấy search_query từ form submit tìm kiếm
if (isset($_GET['search']) && !empty($_GET['search_query'])) {
    $search_query = $_GET['search_query'];
    $rows= search($search_query);
    if (is_array($rows) && count($rows) > 0) {
        $_SESSION['search'] = $rows;
        header('location: ../views/Timkiem.view.php');
    } 
    else{
        echo "<script> alert('Không có kết quả để hiển thị ra')</script>";
    }

}
else{
    echo'<script>alert("Vui lòng nhập từ khóa để tìm kiếm")</script>';
}
//unset($_SESSION['search']);
//print_r($_SESSION['search']);