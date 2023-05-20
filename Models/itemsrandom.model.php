<?php 
include ('../connect/connect.dp.php');
function allitemsrandom()
{
    global $conn;
    $sql = "SELECT*FROM categories inner join clothes on clothes.id_categories= .categories.id_categories ORDER BY RAND();";
    $rows = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

?>