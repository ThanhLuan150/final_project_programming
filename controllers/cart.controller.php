<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../Models/cart.model.php');


if (isset($_SESSION['id_user'])) {
    $users = $_SESSION['id_user'];
}
if (isset($_GET['showcart'])) {
    $users = $_GET['showcart'];
    echo $users;
    $rows = getClothesByIdinCartIDuser($users);
    // print_r($rows);
    $_SESSION['cart'] = $rows;
    print_r($_SESSION['cart']);
    $total_cart = 0;
    $total_quantity = 0;
    // cập nhập giá thuê và tổng tiền của từng sản phẩm theo quantity & Tính tổng tiền và quantity của toàn bộ giỏ hàng 
    foreach ($_SESSION['cart'] as &$item) {
        $item['rent_prices'] = $item['rent_prices'] * $item['quantity'];
        $item['tiencoc'] = $item['tiencoc'] * $item['quantity'];
        $item['total'] = $item['rent_prices'] + $item['tiencoc'];
        $total_cart = $total_cart + $item['total'];
        $total_quantity = $total_quantity + $item['quantity'];
    }
    // Lưu tổng tiền và tổng item vào theo thứu tự $_SESSION['cart'] và $total_cart và truyền cho view
    $_SESSION['total_cart'] = $total_cart;
    $_SESSION['total_quantity'] = $total_quantity;
    // print_r($_SESSION['cart']);
    // unset($_SESSION['cart']);
}

// tăng số lương or thêm sản phẩm
if (isset($_GET['id'])) {
    $id_clothe = $_GET['id'];
    $row = getClothesByIdinClothes($id_clothe);
    $new_clothes = array(
        "image" => $row['image'],
        "name_clothes" => $row['name_clothes'],
        "rent_prices" => $row['rent_prices'],
        'quantity' => 1,
        "tiencoc" => $row["tiencoc"],
        "total" => $row['rent_prices'] + $row["tiencoc"]
    );
    // Check chưa đăng nhập:
    if (!isset($users)) {
        echo 'ámdhjadhashjjjjjjjjjjk';
 
        if (!isset($_SESSION['cart'][$id_clothe])) {
            $_SESSION['cart'][$id_clothe] = $new_clothes;
        } else {
            // check sản phẩm có hay chưa, nếu không có sản phẩm thì thêm mới
            $check = false;
            foreach ($_SESSION['cart'] as $id_clothes => $value) {
                if ($id_clothes == $id_clothe) {
                    $check = true;
                    break;
                }
            };
            if ($check == false) {
                $_SESSION['cart'][$id_clothe] = $new_clothes;
            } else {
                // nếu có sp như nhau thì tăng số lượng
                $_SESSION['cart'][$id_clothe]['quantity']++;
            }
        };

        $total_cart = 0;
        $total_quantity  = 0;
        // cập nhập giá thuê và tổng tiền của từng sản phẩm theo quantity & Tính tổng tiền và quantity của toàn bộ giỏ hàng 
        foreach ($_SESSION['cart'] as $id_clothes => $clothe) {
            $_SESSION['cart'][$id_clothe]['rent_prices'] = $new_clothes['rent_prices'] * $clothe['quantity'];
            $_SESSION['cart'][$id_clothe]['tiencoc'] = $new_clothes['tiencoc'] * $clothe['quantity'];
            $_SESSION['cart'][$id_clothe]['total'] = $_SESSION['cart'][$id_clothe]['rent_prices'] + $_SESSION['cart'][$id_clothe]['tiencoc'];
        }

        // Lưu tổng tiền và tổng item vào theo thứu tự $_SESSION['cart'] và $total_cart và truyền cho view
        foreach ($_SESSION['cart'] as $id_clothes => $clothe) {
            $total_cart += $clothe['total'];
            $total_quantity += $clothe['quantity'];
        }
        $_SESSION['total_cart'] = $total_cart;
        $_SESSION['total_quantity'] = $total_quantity;

        // unset($_SESSION['cart']);

        // check có tài khoảng thì đưa dữ liệu sản phẩm vào carts trong database
    } else {
        // kiểm tra có sản phẩm trùng hay không
        $rows = getClothesByIdinCart();
        print_r($rows);
        $check = false;
        foreach ($rows as $key => $value) {
            if ($key == $id_clothe) {
                $check = true;
                break;
            }
        }

        // nếu không thì thêm sản phẩm mới
        if ($check == false) {
            $quantity = $new_clothes['quantity'];
            insertintoCart($id_clothe, $quantity, $users);
        } else {
            // có thì tăng số lượng
            $new_quantity = $value["quantity"] + $new_clothes['quantity'];
            updateQuantityintoCart($id_clothe, $new_quantity);
        }
        // lấy data từ mysql và gán vào $_SESSION['cart']
        $rows = getClothesByIdinCart();
        // print_r($rows);
        if (!empty($rows)) {
            $_SESSION['cart'] = $rows;
        }
        $total_cart = 0;
        $total_quantity = 0;
        // cập nhập giá thuê và tổng tiền của từng sản phẩm theo quantity & Tính tổng tiền và quantity của toàn bộ giỏ hàng 
        foreach ($_SESSION['cart'] as &$item) {
            $item['rent_prices'] = $new_clothes['rent_prices'] * $item['quantity'];
            $item['tiencoc'] = $new_clothes['tiencoc'] * $item['quantity'];
            $item['total'] = $item['rent_prices'] + $item['tiencoc'];
            $total_cart = $total_cart + $item['total'];
            $total_quantity = $total_quantity + $item['quantity'];
        }
        // Lưu tổng tiền và tổng item vào theo thứu tự $_SESSION['cart'] và $total_cart và truyền cho view
        $_SESSION['total_cart'] = $total_cart;
        $_SESSION['total_quantity'] = $total_quantity;
        // print_r($_SESSION['cart']);
        // unset($_SESSION['cart']);

    }
}

// Giảm số lượng
if (isset($_GET['giamquantity'])) {
    $id_clothe = $_GET['giamquantity'];
    echo $old_quantity = $_SESSION['cart'][$id_clothe]['quantity'];
    if ($old_quantity > 0) {
        echo $rent_prices = ($_SESSION['cart'][$id_clothe]['rent_prices'] / $old_quantity);
        echo $tien_coc = ($_SESSION['cart'][$id_clothe]['tiencoc'] / $old_quantity);
        echo $new_quantity = --$old_quantity;
        // cập nhập giá thuê và tổng tiền của từng sản phẩm theo quantity
        $_SESSION['cart'][$id_clothe]['rent_prices'] =  $rent_prices  * $new_quantity;
        $_SESSION['cart'][$id_clothe]['tiencoc'] =  $tien_coc * $new_quantity;
        $_SESSION['cart'][$id_clothe]['total'] = $_SESSION['cart'][$id_clothe]['rent_prices'] +  $_SESSION['cart'][$id_clothe]['tiencoc'];

        if (isset($users)) {
            updateQuantityintoCart($id_clothe, $new_quantity);

            $rows = getClothesByIdinCart();
            if (!empty($rows)) {
                $_SESSION['cart'] = $rows;
            }
            $total_cart = 0;
            $total_quantity = 0;
            // cập nhập giá thuê và tổng tiền của từng sản phẩm theo quantity & Tính tổng tiền và quantity của toàn bộ giỏ hàng 
            foreach ($_SESSION['cart'] as &$item) {
                $item['rent_prices'] = $rent_prices * $item['quantity'];
                $item['tiencoc'] = $tien_coc * $item['quantity'];
                $item['total'] = $item['rent_prices'] + $item['tiencoc'];
                $total_cart = $total_cart + $item['total'];
                $total_quantity = $total_quantity + $item['quantity'];
            }
            // Lưu tổng tiền và tổng item vào theo thứu tự $_SESSION['cart'] và $total_cart và truyền cho view
            $_SESSION['total_cart'] = $total_cart;
            $_SESSION['total_quantity'] = $total_quantity;

            print_r($_SESSION['cart']);
            // unset($_SESSION['cart']);

        } else {
            $_SESSION['cart'][$id_clothe]['quantity'] =  $new_quantity;

            // Tính tổng tiền và quantity của toàn bộ giỏ hàng 
            $total_cart = 0;
            $total_quantity  = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $id_clothe => $clothes) {
                    $total_cart += $clothes['total'];
                    $total_quantity += $clothes['quantity'];
                }
            }

            // Lưu tổng tiền và tổng item vào theo thứu tự $_SESSION['cart'] và $total_cart và truyền cho view
            $_SESSION['total_cart'] = $total_cart;
            $_SESSION['total_quantity'] = $total_quantity;
            print_r($_SESSION['cart']);
            // unset($_SESSION['cart']);
        }
    }
}
// xoá sản phẩm

// print_r($_SESSION['cart']);
if (isset($_GET['xoa'])) {
    $id_clothe = (int)$_GET['xoa'];
    foreach ($_SESSION['cart'] as $key => $value) {
        echo $key;
        if (isset($users)) {
            if ($key === $id_clothe) {
                $id_cart = $value['id_carts'];
                delProductsinCart($id_cart);
                unset($_SESSION['cart'][$key]);

                // Tính tổng tiền và quantity của toàn bộ giỏ hàng 
                $total_cart = 0;
                $total_quantity  = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $id_clothe => $clothes) {
                        $total_cart += $clothes['total'];
                        $total_quantity += $clothes['quantity'];
                    }
                }

                // Lưu tổng tiền và tổng item vào theo thứu tự $_SESSION['cart'] và $total_cart và truyền cho view
                $_SESSION['total_cart'] = $total_cart;
                $_SESSION['total_quantity'] = $total_quantity;
                break;
            }
        } else {
            if ($key === $id_clothe) {
                unset($_SESSION['cart'][$key]);
                // Tính tổng tiền và quantity của toàn bộ giỏ hàng 
                $total_cart = 0;
                $total_quantity  = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $id_clothe => $clothes) {
                        $total_cart += $clothes['total'];
                        $total_quantity += $clothes['quantity'];
                    }
                }
                // Lưu tổng tiền và tổng item vào theo thứu tự $_SESSION['cart'] và $total_cart và truyền cho view
                $_SESSION['total_cart'] = $total_cart;
                $_SESSION['total_quantity'] = $total_quantity;
                break;
            }
        }
    }
}
unset($users);

header('location: ../views/giohang.view.php');
exit();
