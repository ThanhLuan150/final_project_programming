<?php
// Kết nối đến cơ sở dữ liệu
include('../Connect/connect.dp.php');
function search($search_query){
    global $conn;
    $sql="SELECT*FROM categories inner join clothes on clothes.id_categories= .categories.id_categories where name_clothes LIKE '%$search_query%' or rent_prices LIKE '%$search_query%' or sex LIKE '%$search_query%' ;";
    $rows = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

