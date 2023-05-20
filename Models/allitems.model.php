<?php
// Kết nối đến cơ sở dữ liệu
include('../Connect/connect.dp.php');
function allitems()
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


function randomitems()
{
    global $conn;  
    $sql = "SELECT * FROM categories inner join clothes on clothes.id_categories= .categories.id_categories ORDER BY RAND() ";
    $rows = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    
    return $rows;
    
}
function aodoikham()
{
    global $conn;
    $sql = "SELECT*FROM categories inner join clothes on clothes.id_categories= .categories.id_categories and id_clothes  between 9 and 17 ORDER BY RAND() ;";
    $rows = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function aogiaolinh()
{
    global $conn;
    $sql = "SELECT*FROM categories inner join clothes on clothes.id_categories= .categories.id_categories and id_clothes between 17 and 36 ORDER BY RAND() ;";
    $rows = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function aonguthan()
{
    global $conn;
    $sql = "SELECT*FROM categories inner join clothes on clothes.id_categories= .categories.id_categories and id_clothes between 37 and 55 ORDER BY RAND() ;";
    $rows = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function aotac()
{
    global $conn;
    $sql = "SELECT*FROM categories inner join clothes on clothes.id_categories= .categories.id_categories and id_clothes between 56 and 75 ORDER BY RAND() ;";
    $rows = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function aonhatbinh()
{
    global $conn;
    $sql = "SELECT*FROM categories inner join clothes on clothes.id_categories= .categories.id_categories and id_clothes between 76 and 92 ORDER BY RAND() ;";
    $rows = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}