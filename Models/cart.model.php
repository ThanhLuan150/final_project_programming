<?php
include('../connect/connect.dp.php');
include('../controllers/cart.controller.php');

// Hàm lấy thông tin sản phẩm từ CSDL.
function getClothesByIdinClothes($id_clothe)
{
    global $conn; // Kết nối đến CSDL.
    $sql = "select image, name_clothes, rent_prices, tiencoc from clothes, categories where id_clothes ='$id_clothe' and clothes.id_categories = categories.id_categories"; // Chuỗi truy vấn SQL.
    $action = mysqli_query($conn, $sql) or die("Error"); // Thực thi truy vấn SQL và kiểm tra lỗi.
    $row = mysqli_fetch_assoc($action); // Lấy kết quả truy vấn.
    return $row; // Trả về thông tin sản phẩm.
}

function insertintoCart($id_clothe, $quantity, $user)
{
    global $conn; // Kết nối đến CSDL.
    $sql_carts = "insert into carts (id_clothes, quantity, id_users, created_at) values (" . $id_clothe . ", " . $quantity . ", " . $user . ", NOW())";
    $result = mysqli_query($conn, $sql_carts);
}

function updateQuantityintoCart($id_clothe, $new_quantity)
{
    global $conn; // Kết nối đến CSDL.
    $sql_carts = "UPDATE carts SET quantity = " . $new_quantity . " WHERE id_clothes = " . $id_clothe;
    $result = mysqli_query($conn, $sql_carts);

}


function getClothesByIdinCart()
{
    global $conn; // Kết nối đến CSDL.
    $sql = "SELECT name_clothes, image, id_carts, carts.id_clothes, quantity, id_users,rent_prices, tiencoc, carts.created_at FROM carts, clothes,categories where clothes.id_clothes=carts.id_clothes and clothes.id_categories = categories.id_categories";
    $result_carts = mysqli_query($conn, $sql);
    $rows = array(); // Khởi tạo một mảng để chứa các dòng kết quả.
    while ($row = mysqli_fetch_assoc($result_carts)) {
        $rows[] = $row; // Thêm dòng kết quả vào mảng.
    }

    // Chuyển key của mảng thành id_clothes
    foreach ($rows as $key => $value) {
        // Lấy giá trị của khóa 'id_clothes' và gán vào biến $newKey
        $newKey = $value['id_clothes'];

        // Xóa khóa 'id_clothes' khỏi mảng $value
        unset($value['id_clothes']);

        // Gán mảng $value đã chỉnh sửa vào mảng $rows, sử dụng $newKey làm khóa mới
        $rows[$newKey] = $value;

        // Xóa phần tử mảng ban đầu khỏi mảng $rows
        unset($rows[$key]);
    }
    return $rows;
}

// xoá product
function delProductsinCart($id_cart){
    global $conn; // Kết nối đến CSDL.
    $sql_carts = "DELETE FROM carts WHERE id_carts = $id_cart";
    $result = mysqli_query($conn, $sql_carts);
}
function getClothesByIdinCartIDuser($users)
{
    global $conn; // Kết nối đến CSDL.
    $sql = "SELECT name_clothes, image, id_carts, carts.id_clothes, quantity, id_users,rent_prices, tiencoc, carts.created_at FROM carts, clothes,categories where carts.id_users = $users and clothes.id_clothes=carts.id_clothes and clothes.id_categories = categories.id_categories";
    $result_carts = mysqli_query($conn, $sql);
    $rows = array(); // Khởi tạo một mảng để chứa các dòng kết quả.
    while ($row = mysqli_fetch_assoc($result_carts)) {
        $rows[] = $row; // Thêm dòng kết quả vào mảng.
    }

    // Chuyển key của mảng thành id_clothes
    foreach ($rows as $key => $value) {
        // Lấy giá trị của khóa 'id_clothes' và gán vào biến $newKey
        $newKey = $value['id_clothes'];

        // Xóa khóa 'id_clothes' khỏi mảng $value
        unset($value['id_clothes']);

        // Gán mảng $value đã chỉnh sửa vào mảng $rows, sử dụng $newKey làm khóa mới
        $rows[$newKey] = $value;

        // Xóa phần tử mảng ban đầu khỏi mảng $rows
        unset($rows[$key]);
    }
    return $rows;
}


