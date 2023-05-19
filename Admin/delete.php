<?php
// Kết nối đến cơ sở dữ liệu
require_once 'connect.php';

// Kiểm tra xem có tham số 'id' được truyền từ URL hay không
if(isset($_GET['id'])) {
  $id = $_GET['id'];

  // Thêm câu lệnh SQL để tạm thời tắt ràng buộc khóa ngoại
  $disableFKCheck = "SET FOREIGN_KEY_CHECKS=0";
  mysqli_query($conn, $disableFKCheck);

  // Tạo câu truy vấn SQL để xóa bản ghi dựa trên ID
  $sql = "DELETE FROM clothes WHERE id_clothes = $id";

  // Thực thi truy vấn
  $result = mysqli_query($conn, $sql);

  // Kiểm tra xem truy vấn xóa đã thành công hay không
  if($result) {
    // Nếu thành công, chuyển hướng người dùng đến trang hiển thị danh sách sản phẩm (hoặc trang tương tự)
    header("Location: admin.php");
    exit();
  } else {
    // Nếu không thành công, hiển thị thông báo lỗi
    echo "Lỗi: " . mysqli_error($conn);
  }

  // Bật lại ràng buộc khóa ngoại
  $enableFKCheck = "SET FOREIGN_KEY_CHECKS=1";
  mysqli_query($conn, $enableFKCheck);
}
?>



