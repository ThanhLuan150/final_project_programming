<?php
include('../Models/userpay.model.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
}

if (!isset($id_user) && !isset($_POST['btn'])) {
    $_SESSION['checkusers'] = true;
    header('location: ../views/dangnhap.view.php');
} elseif (!isset($_POST['btn']) && isset($id_user)) {
    // print_r($_SESSION['cart']);
    $row = userpay($id_user);
    $_SESSION['user'] = $row;
    header('location: ../views/Thanhtoan.view.php');
}

if (isset($_POST['btn'])) {
    include('../Models/bill.model.php');
    $id_users = $_SESSION['user']['id_users'];
    $note = $_POST['note'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    bill($id_users, $note, $phone, $address);
    $a = billSelect();
    // $id_bill = $a['id_bills'];
    delProductsinCart();
    unset($_SESSION['cart']);
    if (!isset($_SESSION['cart'])) {
        $_SESSION['total_cart'] = 0;
        $_SESSION['total_quantity'] = 0;
    }
    $_SESSION["order_success"] = true;
    header("location: ../views/home.view.php");
}
