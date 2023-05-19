<?php
// Kiểm tra xem form đã được gửi đi hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $name_clothes = $_POST['name_clothes'];
    $image = $_POST['image'];
    $rent_prices = $_POST['rent_prices'];
    $sex = $_POST['sex'];
    $tiencoc = $_POST['tiencoc'];
    $name_categories = $_POST['name_categories'];
    $created_at = $_POST['created_at'];
    $updated_at = $_POST['updated_at'];

    require_once 'connect.php';
    
    // Lấy id_categories dựa trên name_categories
    $sqlCategories = "SELECT id_categories FROM categories WHERE name_categories = '$name_categories'";
    $resultCategories = mysqli_query($conn, $sqlCategories);
    $rowCategories = mysqli_fetch_assoc($resultCategories);
    $id_categories = $rowCategories['id_categories'];

    // Viết câu lệnh INSERT để thêm dữ liệu vào bảng clothes
    $themsql = "INSERT INTO clothes (image, name_clothes, sex, description, id_categories, created_at, updated_at)
    VALUES ('$image', '$name_clothes', '$sex', '', $id_categories, '$created_at', '$updated_at')";

    if (mysqli_query($conn, $themsql)) {
        header("location: admin.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
