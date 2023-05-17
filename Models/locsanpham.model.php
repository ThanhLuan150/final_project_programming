<?php
// Kết nối đến cơ sở dữ liệu
include('../connect/connect.dp.php');

function find_items()
{
    global $conn;
    $sql = "SELECT id_categories, name_categories FROM categories";
    $rows = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function find_item($id_categories){
    global $conn;
    $sql = "SELECT * FROM categories INNER JOIN clothes ON clothes.id_categories = categories.id_categories WHERE categories.id_categories = '$id_categories'";
    $rows = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

